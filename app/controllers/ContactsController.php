<?php

use Company\Repositories\UserRepository;
use Company\Repositories\ContactRepository;
use Company\Handlers\ResponseHandler\JsonResponse;

class ContactsController extends \BaseController
{
    protected $layout = 'layout';

    protected $userRepository;
    protected $contactRepository;

    public function __construct(UserRepository $userRepository, ContactRepository $contactRepository, JsonResponse $json)
    {
        $this->userRepository            = $userRepository;
        $this->contactRepository        = $contactRepository;
        $this->json                    = $json;

        $this->userRepository->setModel(Auth::user());
    }

    /**
     * Landing Page of Authentication
     * @return [type] [description]
     */
    public function index()
    {
        $contacts = $this->userRepository->getAllContacts();

        if (Request::ajax()) {
            $this->json->set('content', View::make('contacts.blocks.list', compact('contacts'))->render());
            return $this->json->success();
        }

        $this->setPageTitle('Contacts Page');

        $this->layout->content = View::make('contacts.index', compact('contacts'));
    }

    /**
     * Load the Contact Form 
     * @return Json Response
     */
    public function edit()
    {

        $contactId = Input::get( 'contactId' );

        $contact = $this->contactRepository->findByEncryptedId($contactId);

        if (! $contact) {
            $contact = new Contact;
            $contact->id = 0;
        } else {
            if( ! $this->userRepository->hasContact( $contact ) ) {
                return $this->json->error( 'No Hacking ...' );
            }
        }

        $content = View::make('contacts.modals.edit', compact('contact'))
                        ->render();

        $this->json->set('content', $content);
        return $this->json->success();
    }

    /**
     * [save description]
     * @return [type] [description]
     */
    public function store($contactId)
    {
        $inputFields = Input::all();

        $validator = Validator::make(
            $inputFields,
            [
                'first_name'    => 'required',
                'last_name'    => 'required',
                'email'    => 'required_without_all:phone|email',
                'phone' => 'required_without_all:email'
            ]
        );

        if ($validator->fails()) {
            $message = join("<br />", $validator->messages()->all());
            return $this->json->error($message);
        }

        $contact = $this->contactRepository->findByEncryptedId($contactId);

        if( ! $contact ) {
            $contact = new Contact;
        } else {

            if( ! $this->userRepository->hasContact( $contact ) ) {
                return $this->json->error( 'No Hacking ...' );
            }
        }

        $contact->fill( $inputFields );

        $event_type = $contact->id ? 'updated' : 'created';

        if ($this->userRepository->getModel()->contacts()->save($contact)) {
            Event::fire( 'contact.' . $event_type, $contact );  
            return $this->json->success('Contact Saved Successfully ...');
        } else {
            return $this->json->error('There was an error saving the contact ...');
        }
    }

    /**
     * [destroy description]
     * @return [type] [description]
     */
    public function destroy()
    {
        $contactId = Input::get( 'id' );  

        $contact = $this->contactRepository->findByEncryptedId($contactId);

        if (! $contact) {
            return $this->json->error('Error on Deleting ... No Contact Found');
        }

        if (! $this->userRepository->hasContact($contact)) {
            return $this->json->error('Are You Trying To Hack? :)');
        }

        if( $contact->delete() ) {
            Event::fire( 'contact.deleted', $contact );
            $this->json->set( 'id', $contact->id );
            return $this->json->success('Contact Deleted Successfully ...');
        }

        return $this->json->error( 'There was something wrong, please try again ...' );
        
    }

    public function search()
    {
        $text = Input::get('text');

        if (empty($text)) {
            $contacts = $this->userRepository->getAllContacts();
        } else {
            $contacts = $this->contactRepository->getAllBySearch($text, Auth::id());
        }

        $this->json->set('content', View::make('contacts.blocks.list', compact('contacts'))->render());
        return $this->json->success();
    }
}
