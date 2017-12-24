<?php

namespace App\DataModels;

/** @Entity @Table(name="question_type") **/
class QuestionType
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	/** @Column(type="string") **/
	protected $name;

	public function getId() :int { return $this->id; }
	public function getName() :string { return $this->name; }

	public function setName($name) :void { $this->name = $name; }
}