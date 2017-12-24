<?php

namespace App\DataModels;

use Doctrine\ORM\PersistentCollection;
use JsonSerializable;

/** @Entity @Table(name="question_basic") **/
class Question implements JsonSerializable
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	/** @Column(type="string") **/
	protected $description;
	/** @OneToOne(targetEntity="QuestionType") **/
	protected $type;
	/**
	 * @OneToMany(targetEntity="QuestionAnswer", mappedBy="question")
	 * @var answers[] An ArrayCollection of QuestionAnswer objects.
	 **/
	protected $answers;
	/** @Column(type="string") **/
	protected $image_path;

	public function getId() :int                        { return $this->id; }
	public function getDescription() :string            { return $this->description; }
	public function getType() :QuestionType             { return $this->type; }
	public function getImagePath() :string              { return $this->image_path; }
	public function getAnswers() :PersistentCollection  { return $this->answers; }

	public function setDescription($description) :void  { $this->description = $description; }
	public function setImagePath($image_path) :void     { $this->image_path = $image_path; }

	public function jsonSerialize()
	{
		$answers = [];
		foreach ($this->getAnswers() as $answer) {
			$answers[] = [
				'id' => $answer->getId(),
				'name' => $answer->getName(),
				'isCorrect' => $answer->isCorrect()
			];
		}
		return [
			'id' => $this->getId(),
			'description' => $this->getDescription(),
			'type' => $this->getType()->getName(),
			'image_path' => $this->getImagePath(),
			'answers' => $answers
		];
	}
}