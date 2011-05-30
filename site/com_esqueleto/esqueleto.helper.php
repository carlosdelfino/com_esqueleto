<?php
class  CsatVagasHelper {
	final private function CsatVagasHelper() {
		;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $vaga
	 */
	static public function obtemExperienciaObjeto(&$vaga){

		if($vaga->experiencia  == 0){
			$vaga->experiencia   = "S/Exp";
		} else{
			$vaga->experiencia   = "C/Exp";
		}
		return $vaga->experiencia;
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $param
	 */
	static public function obtemExperiencia(&$param){
		if(is_array($param)){
			foreach ($param as &$vaga) {
				self::obtemExperienciaObjeto(&$vaga);
			}
		}
	}
	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $param
	 */
	static public function obtemSalarioObjeto(&$vaga) {
		if($vaga->salario_min == 'Não Informado' && $vaga->salario_max  == 'Não Informado'){
			$salario       = 'Não Informado';
		} else{
			$salario_min   = $vaga->salario_min;
			$salario_max   = $vaga->salario_max;
			$vaga->salario       = "$salario_min até $salario_max";
		}
		return $vaga->salario;
	}

	/**
	 *
	 * @param unknown_type $param
	 */
	static public function obtemSalario(&$param){

		if(is_array($param)){
			foreach ($param as &$vaga) {
				self::obtemSalarioObjeto(&$vaga);
			}
		}
	}
	/**
	 * Ajusta Infomração de data e hora para o padrão de leitura.
	 * Usado nas vagas do Sine.
	 *
	 * Se executado duas vezes sobre a mesma estrutura o resutlado é imprevisivel.
	 *
	 * @param array or vaga $param
	 */
	static public function ajustaDataHora(&$param) {
		if(is_array($param)){
			foreach ($param as &$vaga) {
				self::ajustaDataHoraObjeto(&$vaga);
			}
		}else{
			self::ajustaDataHoraObjeto(&$vaga);
		}
	}

	static public function ajustaDataHoraObjeto(&$vaga){
		$data_hora      = substr($vaga->data_hora,8,2);
		$data_hora      = $data_hora."/".substr($vaga->data_hora,5,2);
		$data_hora      = $data_hora."/".substr($vaga->data_hora,0,4);
		$data_hora      = $data_hora." ás ".substr($vaga->data_hora,11,8);
		$vaga->data_hora = $data_hora;
		return $data_hora;
	}

	/**
	 * Este metodo recebe um array que é uma coleção de objetos vagas ou apenas
	 * um unico objeto vagas.
	 *
	 * Porem o comportamento é imprevisivel ao receber um array associativo.
	 *
	 * @param mix $param (array de vagas ou um objeto vagas
	 */
	static function obtemGrauFormacao(&$param) {
		if(is_array($param)){
			foreach ($param as &$vaga) {
				self::obtemGrauFormacaoObject(&$vaga);
			};
		}elseif(is_object($param)){
			self::obtemGrauFormacaoObject(&$param);
		}
	}

	/**
	 * Echoa o Grau de formação de uma vaga recebida, esta deve possuir conforme
	 * o banco de dados o codigo da formação
	 *
	 * @param vaga $vaga
	 */
	static public function echoGrauFormacao($vaga) {
		self::obtemGrauFormacaoObject($vaga);
		echo $vaga->grauFormacao;
	}

	static public function obtemGrauFormacaoObject(&$vaga) {
		if($vaga->codesc == 1){
			$vaga->grauFormacao = "Ensino Fundamental(1º Grau) Incompleto";
		} elseif($vaga->codesc == 2){
			$vaga->grauFormacao = "Ensino Fundamental(1º Grau) Completo";
		} elseif($vaga->codesc == 3){
			$vaga->grauFormacao = "Ensino Médio(2º Grau) Incompleto";
		} elseif($vaga->codesc == 4){
			$vaga->grauFormacao = "Ensino Médio(2º Grau) Completo";
		}  elseif($vaga->codesc == 5){
			$vaga->grauFormacao = "Ensino Técnico(2º Grau) Completo";
		} elseif($vaga->codesc == 6){
			$vaga->grauFormacao = "Universitário";
		} elseif($vaga->codesc == 7){
			$vaga->grauFormacao = "Superior Incompleto";
		} elseif($vaga->codesc == 8){
			$vaga->grauFormacao = "Superior Completo";
		} elseif($vaga->codesc == 9){
			$vaga->grauFormacao = "Pós-Graduado";
		} elseif($vaga->codesc == 10){
			$vaga->grauFormacao = "Mestrado";
		} elseif($vaga->codesc == 11){
			$vaga->grauFormacao = "Doutorado";
		} elseif($vaga->codesc == 12){
			$vaga->grauFormacao = "Livre Docência";
		} else{
			$vaga->grauFormacao = "Não Exigida";
		}
	}

	/**
	 * Deve passar
	 * @param unknown_type $param
	 */
	static function obtemDescricaoExperiencia(&$param) {
		if(is_array($param)){
			foreach ($param as &$vaga) {
				if($vaga->exp == "0"){
					$vaga->tempoExperiencia = "Sem Experiência";
				} elseif($vaga->exp == "1"){
					$vaga->tempoExperiencia = "3 Meses";
				} elseif($vaga->exp == "2"){
					$vaga->tempoExperiencia = "6 Meses";
				} elseif($vaga->exp == "3"){
					$vaga->tempoExperiencia = "12 Meses - 1 Ano";
				} elseif($vaga->exp == "4"){
					$vaga->tempoExperiencia = "18 Meses - 1 Ano e Meio";
				} elseif($vaga->exp == "5"){
					$vaga->tempoExperiencia = "24 Meses - 2 Anos";
				} elseif($vaga->exp == "6"){
					$vaga->tempoExperiencia = "36 Meses - 3 Anos";
				} elseif($vaga->exp == "7"){
					$vaga->tempoExperiencia = "60 Meses - 5 Anos";
				} else{
					$vaga->tempoExperiencia = "experiência deve ser revista ?????";
				}
			};
		}
	}


	static public function echoCategoriaCnh(&$vaga){
		if(isset($vaga->categoria_cnh) and $vaga->categoria_cnh != '0') {
			if ($vaga->categoria_cnh == "1") echo "A";
			else if ($vaga->categoria_cnh == "2") echo "B";
			else if ($vaga->categoria_cnh == "3") echo "C";
			else if ($vaga->categoria_cnh == "4") echo "D";
			else if ($vaga->categoria_cnh == "5") echo "E";
			else if ($vaga->categoria_cnh == "6") echo "AB";
			else if ($vaga->categoria_cnh == "7") echo "AC";
			else if ($vaga->categoria_cnh == "8") echo "AD";
			else if ($vaga->categoria_cnh == "9") echo "AE";
		} else echo 'Não Exigida';
	}

	static public function obtemBeneficio(&$param) {
		if(is_array($param)){
			foreach ($param as &$vaga) {
				self::obtemBeneficioObject(&$vaga);
			}
		}elseif (is_object($param)){
			self::obtemBeneficioObject(&$param);
		}
	}

	static public function obtemBeneficioObject(&$vaga) {

		$var_benef          = explode(";",$vaga->beneficio);
		if(count($var_benef)){
			$beneficio = new stdClass();
			$beneficio->transporte         = $var_benef[0];
			$beneficio->adicPericulosidade = $var_benef[1];
			$beneficio->alojamento         = $var_benef[2];
			$beneficio->uniforme           = $var_benef[3];
			$beneficio->valeRefeicao       = $var_benef[4];
			$beneficio->assMedica          = $var_benef[5];
			$beneficio->seguroVida         = $var_benef[6];
			$beneficio->valeTransporte     = $var_benef[7];
			$beneficio->refeicao           = $var_benef[8];
			$beneficio->cestaBasica        = $var_benef[9];
			$beneficio->outros             = $var_benef[10];

			$vaga->beneficio = $beneficio;
		}
	}

	static public function contaCandidaturas() {
		$menu   =& JSite::getMenu();
		$item   = $menu->getActive();
		if($item) $params	=& $menu->getParams($item->id);
		else $params	=& $menu->getParams(null);

		$extdb = $params->get('external_vagas_database','csat_principal');
		$exttable = $params->get('external_candidatura_table','candidatura');

		$sql    ="SELECT count(DISTINCT c.cand) FROM $extdb.$exttable as c WHERE c.tipo=7";
		$dbo = JFactory::getDBO();
		$dbo->setQuery($sql);
		$total1 = $dbo->getNumRows();
	}
}
?>