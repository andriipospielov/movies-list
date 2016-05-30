<?php

interface IResourceController
{
    public function index();

    public function create();

    public function show($param);

    public function store();

    public function update();

    public function destroy();

    public function search();
}