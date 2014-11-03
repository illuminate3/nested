<?php

class ItemsHelper {

	private $menus;

	public function __construct($menus) {
	  $this->items = $menus;
	}

	public function htmlList() {
//dd($this->htmlFromArray($this->itemArray()));
	  return $this->htmlFromArray($this->itemArray());
	}

	private function itemArray() {
	  $result = array();
	  foreach($this->items as $item) {
		if ($item->parent_id == 0) {
		  $result[$item->name] = $this->itemWithChildren($item);
		}
	  }
	  return $result;
	}

	private function childrenOf($item) {
	  $result = array();
	  foreach($this->items as $i) {
		if ($i->parent_id == $item->id) {
		  $result[] = $i;
		}
	  }
	  return $result;
	}

	private function itemWithChildren($item) {
	  $result = array();
	  $children = $this->childrenOf($item);
	  foreach ($children as $child) {
		$result[$child->name] = $this->itemWithChildren($child);
	  }
	  return $result;
	}

	private function htmlFromArray($array) {
		$html = '';

		foreach($array as $k=>$v) {
			$html .= '<ul class="">';

//dd($v);
//dd($k);
/*
if (!is_array($k)) {
			$html .= '<li class="top_parent">' . $k . '</li>';
} else {
			$html .= '<li class="">' . $k . '</li>';
}
*/
			$html .= '<li class="">' . $k . '</li>';
			if(count($v) > 0) {
				$html .= $this->htmlFromArray($v);
//dd($v);
			}

			$html .= "</ul>";
		}


//dd($html);
		return $html;
	}

}
