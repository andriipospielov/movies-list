<?php

interface IResourceController
{
    public function index();

    public function create();

    public function show($id);

    public function store($id);

    public function update($id);

    public function destroy($id);
}