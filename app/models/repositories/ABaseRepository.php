<?php 

 namespace Repositories;

 use Eloquent;
 use Helpers\Response\MyResponse;
 
/**
* The Abstract ABaseRepository provides default implementations of the methods defined
* in the IBaseRepository interface. These simply delegate static function calls
* to the right eloquent model based on the $modelClassName.
*/
 
abstract class ABaseRepository implements IBaseRepository {

		protected $modelClassInstance;

		public function __construct(Eloquent $modelClassInstance)
		{
			$this->modelClassInstance = $modelClassInstance;
        }

		public function getAll(array $related = null)
		{
			$related = $this->modelClassInstance->all();

            return $related;
		}

		public function getById($id, array $related = null)
		{
			$related = $this->modelClassInstance->find($id);

            return $related;
		}

		public function getWhere($column, $value, array $related = null)
		{

            $related = $this->modelClassInstance->where($column, '=', $value);

            return $related;
        }

        public function getRecent($limit, array $related = null)
        {

        }

		public function create(array $input)
		{
			$validator = $this->modelClassInstance->validate($input);

			if($validator->passes()) 
			{
				$response = $this->modelClassInstance->create($input);

                return $response;
            } 
            else 
            {
                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => false,
                    'message' => $validator->messages()->toArray()
                    );

                $response = MyResponse::json($data, $status);

                return $response;
            }
		}

		public function update($id, array $input)
		{
			$related = $this->modelClassInstance->find($id);

            $validator = $this->modelClassInstance->validate($input);

            if($validator->passes()) 
            {
                $related->fill($input);

                if($related->save()) 
                {
                    $status = 200;

                    $data = array(
                        'status'  => $status,
                        'success' => true,
                        'message' => 'Event sucessfully updated'
                        );

                    $response = MyResponse::json($data, $status);

                    return $response;

                } 
                else 
                {
                    $status = 200;

                    $data = array(
                        'status'  => $status,
                        'success' => false,
                        'message' => 'Event unsucessfully updated'
                        );

                    $response = MyResponse::json($data, $status);

                    return $response;
                }
            }
            else 
            {
                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => false,
                    'message' => $validator->messages()->toArray()
                    );

                $response = MyResponse::json($data, $status);

                return $response;
  
            }
        }

		public function destroy($ids)
		{
			if($this->modelClassInstance->destroy($ids)) 
			{
                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => true,
                    'message' => 'Event sucessfully deleted'
                    );

                $response = MyResponse::json($data, $status);

                return $response;
            } 
            else 
            {
                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => false,
                    'message' => 'Event unsucessfully deleted'
                    );

                $response = MyResponse::json($data, $status);

                return $response;
            }
		}

		public function deleteWhere($column, $value)
		{
			$related = $this->modelClassInstance->where($column, '=', $value);

			if($related->delete()) {

                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => true,
                    'message' => 'Event sucessfully deleted'
                    );

                $response = MyResponse::json($data, $status);

                return $response;
            } 
            else 
            {
                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => false,
                    'message' => 'Event unsucessfully deleted'
                    );

                $response = MyResponse::json($data, $status);

                return $response;
            }
        }

	}