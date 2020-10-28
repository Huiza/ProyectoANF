INSERT INTO `cuenta_mayors` (`id_cuenta_mayor`, `codigo_cuenta`, `nombre_cuenta`) VALUES
(1, '', 'EFECTIVO Y EQUIVALENTES DE EFECTIVO');



INSERT INTO `subcuenta_primarias` (`id_subcuenta_primaria`, `id_cuenta_mayor`, `codigo_subcuenta_primaria`, `nombre_subcuenta_primaria`) VALUES
(1, 1, '', 'Bancos');



INSERT INTO `subcuenta_secundarias` (`id_subcuenta_secundaria`, `id_subcuenta_primaria`, `codigo_subcuenta_secundaria`, `nombre_subcuenta_secundaria`) VALUES
(1, 1, '', 'Cuenta Corriente');



INSERT INTO `subcuenta_terciarias` (`id_subcuenta_terciaria`, `id_subcuenta_secundaria`, `codigo_subcuenta_terciaria`, `nombre_subcuenta_terciaria`) VALUES
(1, 1, '', 'Banco Agrícola');
