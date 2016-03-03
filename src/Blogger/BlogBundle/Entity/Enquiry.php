<?php
// src/Blogger/BlogBundle/Entity/Enquiry.php

namespace Blogger\BlogBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class Enquiry
{
	private $id;
	private $date;
	private $title;
	private $author;
	private $content;
	private $published = true;
	private $image;
	private $categories;
	private $applications;
	private $updatedAt;
	private $nbApplications = 0;
	private $slug;


	// … Les getters et setters
}