<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\DataBase;
use App\Core\Helpers\RequestHelper;
use App\DataModels\Question;

class QuestionController extends Controller
{
	use RequestHelper;

	private $db;

	public function __construct()
	{
		parent::__construct();
		header('Content-Type: application/json');
		$this->db = DataBase::getInstance()->getEntityManager();
	}

	public function getAll() :string
	{
		return json_encode($this->db->getRepository(Question::class)->findAll());
	}

	public function get(int $id) :string
	{
		return json_encode($this->db->getRepository(Question::class)->findOneBy(['id' => $id]));
	}
}