<?php
class  EsqueletoHelper {
	final private function EsqueletoHelper() {
		;
	}
	
	/*
	 * Abaixo devem ser criado metodos Estaticos
	 * Cada metodo deve ser um factory ou um método auxiliar.
	 */
	
	/**
	 * Informa que se pode encontrar os objetos de tabela no diretorio "tables
	 * 
	 * Por padrão é procurado no diretorio "table" no singular.
	 */
	public static function loadTables(){
		JTable::addIncludePath(JPATH_COMPONENT_SITE.DS.'tables');
	}
}
?>