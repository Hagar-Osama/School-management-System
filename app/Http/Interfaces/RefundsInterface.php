<?php
namespace App\Http\Interfaces;

interface RefundsInterface {

    public function index();

    public function create($student_id);

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);


}
