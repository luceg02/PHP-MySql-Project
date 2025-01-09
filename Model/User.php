<?php
class User {
	private  $id;
	private  $email;
	private  $password;
	private  $firstName;
	private  $lastName;
	private  $address;
	private  $postalCode;
	private  $city;


    public function __construct($data) {
        $this->hydrate($data);
    }


    public function hydrate($data) {
        foreach($data as $fieldName=>$fieldValue) {
            $this->{'set'.ucwords($fieldName)}($fieldValue);
        }
    }

	public function getId() {
		return $this->id;
	}

    public function setEmail($newEmail) {
        $this->email = $newEmail;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setPassword($newPassword) {
        $this->password = $newPassword;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setFirstName($newFirstName) {
        $this->firstName = $newFirstName;
    }
    public function getFirstName() {
        return $this->firstName;
    }

    public final  function getLastName() {
		return $this->lastName;
	}
	public final  function setLastName($newLastName) {
		$this->lastName = $newLastName;
	}

	public final  function getAddress() {
		return $this->address;
	}
	public final  function setAddress($newAddress) {
		$this->address = $newAddress;
	}

	public final  function getPostalCode() {
		return $this->postalCode;
	}
	public final  function setPostalCode($newPostalCode) {
		$this->postalCode = $newPostalCode;
	}

	public final  function getCity() {
		return $this->city;
	}
	public final  function setCity($newCity) {
		$this->city = $newCity;
	}
}