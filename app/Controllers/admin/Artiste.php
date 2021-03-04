<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtisteModel;

class Artiste extends BaseController
{
	public $artistModels = NULL;

	public function __construct(){
		$this->artistModels = new ArtisteModel();
	}

	public function index()
	{	
		$listArtists = $this->artistModels->findAll();
		//dd($listArtists);
		/** exemple de passage de variable a une vue */ 
		$data = [
			'page_title' => 'Connexion à wwww.site.com' ,
			'aff_menu'  => true,
			'tabArtists' => $listArtists,
			
		];

	
		echo view('common/HeaderAdmin', $data);
		echo view('Admin/Artiste/List', $data);
		echo view('common/FooterSite');
	}
	
	public function edit($id=NUll){
		$artist = $this->artistModels->where('id', $id)
									 ->first();
		
		//Je controle si je viens de mon formulaire
		if(!empty($this->request->getVar('save'))){//On vérifie que la variable save existe, si elle existe sa veut dire qu'on' a poster le formulaire.
			  //set rules validation form
			  $rules = [//rules pour règles en français ; ici Rules nous permet de controler les données saisies dans le formulaire. 
				'artistName'          => 'required|min_length[3]|max_length[20]',// ici artistName est requis, longueur minimale 3, longueur maximale 20.
				'artistPrenom'         => 'required|min_length[6]|max_length[20]',
				'artistNaissance'      => 'required',
			];
		 
		if($this->validate($rules)){
			$data = [
				'nom'     => $this->request->getVar('artistName'),
				'prenom'    => $this->request->getVar('artistPrenom'),
				'annee_naissance' => $this->request->getVar('artistNaissance'),
			];
			if($this->request->getVar('save')== "update"){
				$this->artistModels->where('id', $id)
							   ->set($data)->update();
			}else {
				redirect()->to('admin/artiste/list');
			}

			
			}else{
				

			}
		}

		$data = [
		'page_title' => 'Connexion à wwww.site.com' ,
		'aff_menu'  => true,
		'formArtist' => $artist,
			
		
	];
		echo view('common/HeaderAdmin', $data);
		echo view('Admin/Artiste/Edit', $data);
		echo view('common/FooterSite');
		
		
	}

	public function delete(){

	}
}
