<?php
class  EsqueletoHelper {
	final private function EsqueletoHelper() {
		;
	}
	
	/*
	 * Abaixo devem ser criado metodos Estaticos
	 * Cada metodo deve ser um factory ou um método auxiliar.
	 */
	
	public static function loadTables(){
		JTable::addIncludePath(JPATH_COMPONENT_SITE.DS.'tables');
	}
}
?>