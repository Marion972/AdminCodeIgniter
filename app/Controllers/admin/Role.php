<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\ArtisteModel;
use App\Models\FilmModel;

class Role extends BaseController
{
	public $roleModels = NULL;
	public $filmModels = NULL;

	public function __construct(){
		$this->roleModels = new RoleModel();
		$this->artistModel = new ArtisteModel();
		$this->filmModels = new FilmModel();
	}

	public function index()
	{	
		$listRole = $this->roleModels->find();
		//dd($listArtists);
		/** exemple de passage de variable a une vue */ 
		$data = [
			'page_title' => 'Connexion à wwww.site.com' ,
			'aff_menu'  => true,
			'artistModel' => $this->artistModel,
			'filmModel' => $this->filmModels,
			'tabRoles' => $this->roleModels->orderBy('id_acteur', 'DESC')->paginate(10),
			'pager' => $this->roleModels->pager,			
		];

	
		echo view('common/HeaderAdmin', $data);
		echo view('Admin/Role/List', $data);
		echo view('common/FooterSite');
	}
	
	public function edit($id=NUll){
		$role = $this->RoleModels->where('id', $id)
									 ->first();
		
		//Je controle si je viens de mon formulaire
		if(!empty($this->request->getVar('save'))){//On vérifie que la variable save existe, si elle existe sa veut dire qu'on' a poster le formulaire.
			  //set rules validation form
			  $rules = [//rules pour règles en français ; ici Rules nous permet de controler les données saisies dans le formulaire. 
				'nomFilm'          => 'required|min_length[3]|max_length[20]',// ici artistName est requis, longueur minimale 3, longueur maximale 20.
				'nomActeur'         => 'required|min_length[6]|max_length[20]',
				'nomRole'      => 'required',
			];
		 
		if($this->validate($rules)){
			$data = [
				'nomFilm'     => $this->request->getVar('filmName'),
				'nomActeur'    => $this->request->getVar('actorName'),
				'nomRole' => $this->request->getVar('roleName'),
			];
			if($this->request->getVar('save') == "update"){
				$this->roleModels->where('id', $id)
							   ->set($data)->update();
			}else {
				$this->roleModels->save($data);			
				redirect()->to('/Admin/role/');
			}

			
			}else{
				

			}
		}

		$data = [
		'page_title' => 'Connexion à wwww.site.com' ,
		'aff_menu'  => true,
		'formRole' => $role,
			
		
	];
		echo view('common/HeaderAdmin', $data);
		echo view('Admin/Role/Edit', $data);
		echo view('common/FooterSite');
		
		
	}

	public function delete($id = 0, $page = 0){
		$this->artistModels->delete(['id' => $id]);

		return redirect()->to('/Admin/Role/');
	}
}
