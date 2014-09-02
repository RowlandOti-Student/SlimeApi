<?php 

    namespace Services;

  //Each service class would extend a ABaseService class which 
 //implements the following interface:
 
  interface  IBaseService {

    public function getAll();
    public function getBy($id);
    //public function getWhere($column, $value, array $related = null);
    //public function getRecent($limit, array $related = null);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    //public function deleteWhere($column, $value);
  }