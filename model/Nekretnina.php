<?php 
	class Nekretnina
	{
		public $naziv;
		public $opis_nekretnine;
		public $broj_soba;
		public $idnekretnina;
		public $cijena;

		public function __construct($naziv, $opis_nekretnine, $broj_soba,$idnekretnina,$cijena)
		{
			$this->naziv=$naziv;
			$this->opis_nekretnine=$opis_nekretnine;
			$this->broj_soba=$broj_soba;
			$this->idnekretnina=$idnekretnina;
			$this->cijena=$cijena;
		}
	}

	?>