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

        if (Request::ajax()) {
            $this->beforeFilter('csrf');
        }

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
    public function edit($contactId)
    {
        $contact = $this->contactRepository->getById($contactId);

        if (! $contact) {
            $contact = new Contact;
            $contact->id = 0;
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
                'name'    => 'required',
                'email'    => 'required_without_all:phone|email',
                'phone' => 'required_without_all:email'
            ]
        );

        if ($validator->fails()) {
            $message = join("<br />", $validator->messages()->all());
            return $this->json->error($message);
        }

        $contact = $this->contactRepository->instantiate($contactId, $inputFields);

        if ($this->userRepository->getModel()->contacts()->save($contact)) {
            return $this->json->success('Contact Saved Successfully ...');
        } else {
            return $this->json->error('There was an error saving the contact ...');
        }
    }

    /**
     * [destroy description]
     * @return [type] [description]
     */
    public function destroy($contactId)
    {
        $contact = Contact::find($contactId);

        if (! $contact) {
            return $this->json->error('Error on Deleting ... No Contact Found');
        }

        if (! $this->userRepository->hasContact($contact)) {
            return $this->json->error('Are You Trying To Hack? :)');
        }

        $contact->delete();
        return $this->json->success('Contact Deleted Successfully ...');
    }

    public function search()
    {
        $text = Input::get('text');

        if (empty($text)) {
            $contacts = $this->userRepository->getAllContacts();
        } else {
            $contacts = $this->contactRepository->getAllBySearch($text);
        }

        $this->json->set('content', View::make('contacts.blocks.list', compact('contacts'))->render());
        return $this->json->success();
    }
}
