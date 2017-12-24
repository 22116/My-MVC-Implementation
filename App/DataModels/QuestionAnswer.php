<?php

namespace App\DataModels;

/** @Entity @Table(name="question_answer") **/
class QuestionAnswer
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	/** @Column(type="boolean") **/
	protected $is_correct;
	/** @ManyToOne(targetEntity="Question", inversedBy="answers") **/
	protected $question;
	/** @Column(type="string") **/
	protected $name;

	public function getId()                                 { return $this->id; }
	public function isCorrect() :bool                       { return $this->is_correct; }
	public function getQuestionId()                         { return $this->question; }
	public function getName() :string                       { return $this->name; }

	public function setIsCorrect(bool $is_correct) :void    { $this->is_correct = $is_correct; }
	public function setName($name) :void                    { $this->name = $name; }

}