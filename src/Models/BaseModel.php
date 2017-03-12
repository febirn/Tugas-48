<?php

namespace App\Models;

abstract class BaseModel
{
	protected $table;
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function createData(array $data)
	{
		$valuesColumn = [];
		$valuesData = [];

		foreach ($data as $dataKey => $dataValue) {
			$valuesColumn[$dataKey] = ':' . $dataKey;
			$valuesData[$dataKey] = $dataValue;
		}

		$this->db->insert($this->table)
				 ->values($valuesColumn)
				 ->setParameters($valuesData)
				 ->execute();
	}

	public function getAll()
	{
		$this->db->select('*')->from($this->table)
				 ->where('deleted = 0');
		$query = $this->db->execute();

		return $query->fetchAll();
	}

	public function find($id)
	{
		$this->db->select('*')->from($this->table)
				 ->where('id = ' . $id . ' AND deleted = 0');
		$query = $this->db->execute();

		return $query->fetch();
	}

	public function softDel($id)
	{
		$this->db->update($this->table)
				 ->set('deleted', '1')
				 ->where('id = ' . $id);
		$query = $this->db->execute();
	}

	public function hardDel($id)
	{
		$this->db->deleted($this->table)
				 ->where('id = ' . $id);

		$query = $this->db->execute();
	}
}