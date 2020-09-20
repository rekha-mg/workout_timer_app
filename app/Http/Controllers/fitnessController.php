<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;


class fitnessController extends Controller
{
    public function sendResponse($success,$result, $message, $response_code)
    				{
        $response = [
            'success' => $success,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, $response_code);
    				}

    public function showAll(Request $request)
    {
        Log::info('Display all records: ');
        $limit = $request->query('limit', 5);
        try {
            $res = DB::select('select count(*) as total from fitnessapp');
            Log::info('Total number of rounds' . $res[0]->total);
            $total_records = $res[0]->total;
            if ($total_records > $limit) {
                $record_list = DB::select('select * from fitnessapp limit ?', [$limit]);
            } else {
                $record_list = DB::select('select * from fitnessapp');
            }
        } catch (\PDOException $pex) {
            Log::critical('some error: ' . print_r($pex->getMessage(), true)); //xampp off
            return $this->sendResponse("false", "", 'error related to database', 500);
        } catch (\Exception $e) {
            Log::critical('some error: ' . print_r($e->getMessage(), true));
            Log::critical('error line: ' . print_r($e->getLine(), true));
            return $this->sendResponse("", 'some error in server', 500);
        }
        return $this->sendResponse("true", $record_list, 'request completed', 200);
    }


    public function showOne(Request $req, $id)
    {
        if ($id > 0 && $id < 20) {
            try {
                Log::info('display details  of : ' . $id);
                $list = DB::select('select * from fitnessapp where id = ?', [$id]);
            } catch (\PDOException $pex) {
                Log::critical('some error: ' . print_r($pex->getMessage(), true)); //xampp off
                return $this->sendResponse("false", "", 'error related to database', 500);
            } catch (\Exception $e) {
                Log::critical('some error: ' . print_r($e->getMessage(), true));
                Log::critical('error line: ' . print_r($e->getLine(), true));
                return $this->sendResponse("false", "", 'some error in server', 500);
            }
        } else {
            return $this->sendResponse("false", "", 'some error in id', 500);
        }
        return $this->sendResponse("true", $list, 'request completed', 200);
   }
     public function create(Request $req){
     	 
          	if ( $req->has('excercise') && $req->has('seconds') && $req->has('rounds')) {
            	try {
                    $exe = $req->input('excercise');
     	 			$sec = $req->input('seconds');
     	 			$rnd = $req->input('rounds');
          			
          			DB::beginTransaction();
          			$result = DB::insert('insert into fitnessapp (excercise,seconds,rounds) values (? ,?,?)', [$exe,$sec,$rnd]);
					log::info('inserted : ' . $exe);
                    DB::commit();
                    }
            
            	catch (\PDOException $pex) {
                	Log::critical('some error: ' . print_r($pex->getMessage(), true)); //xampp off
                	DB::rollBack();
                	return $this->sendResponse("false", "", 'error related to database', 500);
            	}
            	catch (\Exception $e) {
                Log::critical('some error: ' . print_r($e->getMessage(), true));
                Log::critical('error line: ' . print_r($e->getLine(), true));
                log::info('during inserting : ' . $exe .$rnd);
                DB::rollBack();
           	 	}
        	} else {
            DB::rollBack();
            return $this->sendResponse("false", "", 'some error in input', 500);
        }
        return $this->sendResponse("true", $exe, 'Record inserted successfully', 200);
     	 
     }

     public function delete($id)
    {
        if ($id > 0 && $id < 20) {
            try {
                $res = DB::delete('delete from fitnessapp where id = ?', [$id]);
            } catch (\PDOException $pex) {
                Log::critical('some error: ' . print_r($pex->getMessage(), true)); //xampp off
                return $this->sendResponse("false", "", 'error related to database', 500);
            } catch (\Exception $e) {
                Log::critical('some error: ' . print_r($e->getMessage(), true));
                Log::critical('error line: ' . print_r($e->getLine(), true));
                return $this->sendResponse("false", "", 'some error in server', 500);
            }
        } else {
            return $this->sendResponse("false", "", 'incorrect order id', 500);
        }
        Log::info('deleted  record: ' . $id);
        return $this->sendResponse("true", "", 'deleted successfully', 201);
    }
}
