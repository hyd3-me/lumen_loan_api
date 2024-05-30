<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    public function getAll()
    {
        return response()->json(Loan::all());
    }

    public function postLoan(Request $request)
    {
        $response = array();
        $parameters = $request->all();

        $rules =  array(
            'amount'    => 'required|integer',
        );
        $amount = $parameters['amount'];
 
        $messages = array(
            'amiunt.required' => 'amount is required.'
        );
        $validator = \Validator::make(array('amount' => $amount), $rules, $messages);

        if(!$validator->fails()) {
            $response = Loan::create($request->all());
            return response()->json($response, 201);
        } else {
            $errors = $validator->errors();
               return response()->json(["error" => 'Validation error(s) occurred', "message" =>$errors->all()], 400);
        }
    }

    public function update($id, Request $request)
    {
        $loan = Loan::findOrFail($id);
        $loan->update($request->all());

        return response()->json($loan, 200);
    }

    public function getId($id)
    {
        return response()->json(Loan::find($id));
    }

    public function delete($id)
    {
        try {
            Loan::findOrFail($id)->delete();
            return response('Deleted Successfully', 200);
        } catch(ModelNotFoundException $e) {
            return response(['status' => 'error', "message" => $e->getMessage()], 200);
        }
        
    }
}