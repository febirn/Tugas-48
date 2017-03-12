<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use App\Models\UserModel;

class UserController extends BaseController
{
	public function index(Request $request, Response $response)
	{
		$user = new UserModel($this->db);

		$userAll = $user->getAll();
		$data['users'] = $userAll;

		return $this->view->render($response, 'users/all.twig', $data);
	}

	public function getByid(Request $request, Response $response, $args)
	{
		$user = new UserModel($this->db);

		$getUser = $user->find($args['id']);
		$data['users'] = $getUser;

		return $this->view->render($response, 'users/profile.twig', $data);
	}

	public function getAdd(Request $request, Response $response)
	{
		return $this->view->render($response, 'users/add.twig');
	}

	public function add(Request $request, Response $response)
	{
		$user = new UserModel($this->db);

		$this->validation->rule('required', ['username', 'password', 'email', 'first_name', 'last_name']);
		$this->validation->rule('email', 'email');

		if ($this->validation->validate()) {
			$user->createData($request->getParams());

			$_SESSION['success'] = "INPUT DATA SUCCESS";

			return $response->withRedirect($this->router->pathFor('user.add'));
		} else {
			$_SESSION['errors'] = $this->validation->errors();
			$_SESSION['old'] = $request->getParams();

			return $response->withRedirect($this->router->pathFor('user.add'));
		}
	}

	public function softDelete(Request $request, Response $response, $args)
	{
		$user = new UserModel($this->db);

		$softDelete = $user->softDel($args['id']);

		return $response->withRedirect($this->router->pathFor('user'));
	}

}

?>