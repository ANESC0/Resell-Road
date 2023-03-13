<?php
class SessionHelper {
  
  public function setVar($varName, $varValue) {
    $_SESSION[$varName] = $varValue;
    return $this;
  }

  public function getVar($varName) {
    if ($this->isVarExist($varName)) {
      return $_SESSION[$varName];
    }
    return false;
  }

  public function isVarExist($varName) {
    return isset($_SESSION[$varName]);
  }

  
}