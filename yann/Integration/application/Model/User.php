 
<?php

App::uses('AppModel','Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


class User extends AppModel {

		public $belongsTo = array(
			'Usercategorie',
			'Civility'
			);

		

		public $name = 'User';

	    public $validate = array(
	    'civility_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Veuillez renseigner votre civilité !', 
	    ),
        'username' => array(
            'username-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre nom d\'utilisateur !',
	            
	        ),
	        'username-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-_0-9]+$/',
                'message'  => 'Chiffres et lettres uniquement !',
                
            ),
            'username-rule-3' => array(
                'rule'    => array('between', 3, 15),
                'message' => 'Nom d\utilisateur entre 3 et 15 caractères !',
                
        	),  
        	'username-rule-3' => array(
	            'rule' => 'isUnique',
	            'message' => 'Nom d\'utilisateur déjà utilisé !',
	            
	        ), 
        ),
        'email' => array(
	        'email-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre Adresse Email !',
	            
	        ),
	        'email-rule-2' => array(
	            'rule' => 'email',
	            'message' => 'Addresse Email invalide !',
	            
	        ),
	        'email-rule-3' => array(
	            'rule' => 'isUnique',
	            'message' => 'Adresse Email déjà utilisé !',
	            
	        ),
	    ),
	    'remail' => array(
	    	'remail-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez confirmer votre mail !',
	            
	        ),
	    	'remail-rule-2' => array(
	            'rule' => array('equaltofield','email'),
	            'message' => 'Le mail et la confirmation du mail doivent être identiques !',
				'on' => 'create', // Limit validation to 'create' or 'update' operations
				
            ),
        ),
	    'password' => array(
	    	'password-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre mot de passe !',
	            
	        ),
	        'password-rule-2' => array(
                'rule'    => array('between', 6, 50),
                'message' => 'Mot de passe entre 6 et 50 caractères',
                
            ),
            'password-rule-3' => array(
                'rule'     => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}$/',
                'message'  => 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre !',
                
            ),
        ),
	    'repassword' => array(
	    	'repassword-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez confirmer votre mot de passe !',
	            
	        ),
	    	'repassword-rule-2' => array(
	            'rule' => array('equaltofield','password'),
	            'message' => 'Le mot de passe et la confirmation du mot de passe doivent être identiques !',
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
				
            ),
        ),
	    'lastname' => array(
	    	'lastname-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre nom !',
	            
	        ),
	        'lastname-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !',
                
            ),
	        'lastname-rule-3' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Nom entre 3 et 30 caractères',
                
            ),
        ),
	    'firstname' => array(
	    	'firstname-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre prénom !',
	            
	        ),
	        'firstname-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !',
                
            ),
	        'firstname-rule-3' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Prénom entre 3 et 30 caractères',
                
            ),
        ),
        'street' => array(
        	'street-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre rue !',
	            
	        ),
            'street-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s0-9\']+$/',
                'message'  => 'Chiffres et lettres uniquement !',
                
            ),
            'street-rule-3' => array(
                'rule'    => array('between', 3, 50),
                'message' => 'Rue entre 3 et 50 caractères',
                
        	),
     	),
        'zipcode' => array(
        	'zipcode-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre code postal !',
	            
	        ),
            'zipcode-rule-2' => array(
                'rule'     => '/^[0-9]{5}$/',
                'message'  => '5 Chiffres uniquement !',
                
            ),
     	),
    	'city' => array(
	    	'city-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre ville !',
	            
	        ),
	        'city-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !',
                
            ),
	        'city-rule-3' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Ville entre 3 et 30 caractères',
       		),   
	    ),
	    'maxweeklypub' => array(
        	'maxpub-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner le nombre de publication maximum !',
	            
	        ),
            'maxpub-rule-2' => array(
                'rule'     => '/^[0-9]+$/',
                'message'  => 'Chiffres positifs uniquement !',
                
            ),
     	),

    );

	/*Fonction :	Compare 2 champs
	**Appel : 		'rule' => array('equaltofield','champAComparerAuChampActuel')
	**Retour : 		True si égaux, false si différents
	**Exemple :		Pour comparer une confirmation de password avec un password 
	**				'repassword' => array(
		        	    'rule' => array('equaltofield','password'),
	            		'message' => 'Le mot de passe et la confirmation du mot de passe doivent être identiques !',
						'on' => 'create', // Limit validation to 'create' or 'update' operations
	        		)
		*/
	public function equaltofield($check,$otherfield)
    {
        //get name of field
        $fname = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    } 

 




   	//hash du mot de passe
   	public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    } 



}