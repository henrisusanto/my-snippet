<?php

interface IUserRepo
{
	public function getUsers();
}

class HenriUser implements IUserRepo
{
	public function getUsers()
	{
		return 'henri';
	}
}

class SusantoUser implements IUserRepo
{
	public function getUsers()
	{
		return 'susanto';
	}
}

class UserController
{
	private $repo;
	function __construct (IUserRepo $repo)
	{
		$this->repo = $repo;
	}

	function getUserList ()
	{
		return $this->repo->getUsers();
	}
}

$controller = new UserController(new HenriUser());
echo $controller->getUserList();