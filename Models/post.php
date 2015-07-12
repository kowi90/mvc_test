<?php

namespace Models;

use Lib\Model as Model;


class Post extends Model
{
	protected $id;
	protected $date;
	protected $title;
	protected $text;
	protected $posted_by;
	protected $alias;

	//Összes bejegyzés (rövidített text tartalommal)
	public function getAll()
	{
		return $this->db->query("SELECT id,date,title,SUBSTRING(text, 1, 100) as text,posted_by,alias FROM posts ORDER BY date DESC");
	}

	//Bejegyzés keresése attribútum alapján
	public function findByAttr($attr,$value)
	{
		return $this->db->query("SELECT * FROM posts WHERE $attr='$value'");
	}

	//Bejegyzés létrehozása
	public function create($date,$title,$text,$posted_by,$alias)
	{
		$this->date = $date;
		$this->title = $title;
		$this->text = $text;
		$this->posted_by = $posted_by;
		$this->alias = $alias;
	}

	//Bejegyzés szerkesztése
	public function edit($id,$date,$title,$text,$posted_by,$alias)
	{
		$this->id = $id;
		$this->create($date,$title,$text,$posted_by,$alias);
	}

	//alias alapján törlés
	public function deleteByAlias($alias)
	{
		return $this->db->query("DELETE FROM posts WHERE alias='$alias'");
	}

	//változások elmentése
	public function save()
	{
		if ($this->date != NULL && $this->title != NULL && $this->text != NULL && $this->posted_by != NULL && $this->alias != NULL)
		{
			if ($this->id != NULL)
			{
				$this->db->query("UPDATE posts
									SET date='$this->date',
										title='$this->title',
										text='$this->text',
										posted_by='$this->posted_by',
										alias='$this->alias'

									WHERE id='$this->id' ");
			}
			else
			{	
		 		$this->db->query("INSERT INTO posts (date,title,text,posted_by,alias)
							  VALUES ('$this->date', '$this->title', '$this->text', '$this->posted_by', '$this->alias')
								 ");
			}					 		
		}
		else
		{
			Error::saveFail();			
		}

	}

}