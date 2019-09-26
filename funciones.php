<?php

function validarRegistracion($datos) {
  $errores = [];

  if (strlen($datos["name"]) < 5) {
    $errores["name"] = "El nombre de contener más de 4 caracteres.";
  }

  // if ($datos["birthday"] == "") {
  //   $errores["birthday"] = "Debe completar el campo birthday.";
  // }
  // else if (validateAge($datos["birthday"]) == false) {
  //   $errores["birthday"] = "Debe ser mayor de edad para registratse";
  // }

  if (!isset($datos["gender"])){
    $errores["gender"] = "Debe seleccionar un gender";
  }



  if ($datos["password"] == "") {
    $errores["password"] = "Debe completar el password.";
  }

  if ($datos["cpassword"] == "") {
    $errores["cpassword"] = "Debe completar la confirmación de password.";
  }

  if ($datos["password"] != "" && $datos["cpassword"] != "" && $datos["password"] != $datos["cpassword"]) {
    $errores["password"] = "Password y confirmación deben ser iguales.";
  }

  if ($datos["email"] == "") {
    $errores["email"] = "Debe completar el campo email.";
  }
  else if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "Debe ingresar un mail válido.";
  }
  // else if (existeElEmail($datos["email"])) {
  //   $errores["email"] = "Ese email ya esta tomado";
  // }

  return $errores;
}

// function existeElEmail($email) {
//   $usuario = buscarUsuarioPorEmail($email);
//
//   if ($usuario == null) {
//     return false;
//   } else {
//     return true;
//   }
// }

// function buscarUsuarioPorEmail($email) {
//   $usuarios = traerTodosLosUsuarios();
//
//   foreach ($usuarios as $usuario) {
//     if ($usuario["email"] == $email) {
//       return $usuario;
//     }
//   }
//
//   return null;
// }

// function buscarUsuarioPorId($id) {
//   $usuarios = traerTodosLosUsuarios();
//
//   foreach ($usuarios as $usuario) {
//     if ($usuario["id"] == $id) {
//       return $usuario;
//     }
//   }
//
//   return null;
// }

// function armarUsuario($datos) {
//   return [
//     "id" => proximoId(),
//     "name" => ucfirst($datos["name"]),
//     "email" => $datos["email"],
//     "birthday" => $datos["birthday"],
//     "phone" => $datos["phone"],
//     "password" => password_hash($datos["password"], PASSWORD_DEFAULT),
//     "gender" => $datos["gender"]
//   ];
// }

// function proximoId() {
//   $usuarios = traerTodosLosUsuarios();
//
//   // Si no hay usuarios el proximo id es el ultimo
//   if (empty($usuarios)) {
//     return 1;
//   }
//
//   // obtener ultimo usuario
//   $ultimoUsuario = end($usuarios);
//
//   // Del ultimo usuario obtenemos el id y sumamos uno
//   return $ultimoUsuario["id"] + 1;
// }
//
// function traerTodosLosUsuarios() {
//   $archivo = file_get_contents("usuarios.json");
//
//   if ($archivo == "") {
//     return [];
//   }
//
//   $usuarios = json_decode($archivo, true);
//
//   return $usuarios;
// }
//
// function registrar($usuario) {
//   $usuarios = traerTodosLosUsuarios();
//
//   $usuarios[] = $usuario;
//
//   $usuariosJSON = json_encode($usuarios);
//
//   file_put_contents("usuarios.json", $usuariosJSON);
// }
//
function validateAge($birthday, $age = 18)
{
    // $birthday can be UNIX_TIMESTAMP or just a string-date.
    if(is_string($birthday)) {
        $birthday = strtotime($birthday);
    }

    // check
    // 31536000 is the number of seconds in a 365 days year.
    if(time() - $birthday < $age * 31536000)  {
        return false;
    }

    return true;
}

?>
