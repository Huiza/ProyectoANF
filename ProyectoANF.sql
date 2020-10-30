INSERT INTO `cuenta_mayors` (`id_cuenta_mayor`, `codigo_cuenta`, `nombre_cuenta`) VALUES
(1, '', 'ACTIVO'),
(2, '', 'ACTIVO CORRIENTE'),
(3, '', 'EFECTIVO Y EQUIVALENTES DE EFECTIVO'),
(4, '', 'CUENTAS Y DOCUMENTOS POR COBRAR'),
(5, '', 'CUENTAS POR COBRAR ARRENDAMIENTO FINANCIERO'),
(6, '', 'INVENTARIOS'),
(7, '', 'PEDIDOS EN TRANSITO'),
(8, '', 'RESERVA PARA OBSOLESCENCIA DE INVENTARIOS'),
(9, '', 'INVERSIONES TEMPORALES'),
(10, '', 'PARTES RELACIONADAS'),
(11, '', 'GASTOS PAGADOS POR ANTICIPADO'),
(12, '', 'IVA - CRÉDITO FISCAL'),
(13, '', 'PAGO A CUENTA-IMPUESTO SOBRE RENTA'),
(14, '', 'DIVIDENDOS POR COBRAR'),
(15, '', 'ACTIVOS NO CORRIENTES MANTENIDOS PARA LA VENTA'),
(16, '', 'ACTIVO NO CORRIENTE'),
(17, '', 'PROPIEDAD PLANTA Y EQUIPO'),
(18, '', 'DEPRECIACIÓN ACUM. DE PROPIEDAD PLANTA Y EQUIPO'),
(19, '', 'DETERIORO ACUM. DE PROPIEDAD PLANTA Y EQUIPO'),
(20, '', 'REVALUACIÓN DE PROPIEDAD PLANTA Y EQUIPO'),
(21, '', 'DEPRECIACIÓN DE REVALUOS DE PROPIEDAD PLANTA Y EQUIPO'),
(22, '', 'PROPIEDAD PLANTA Y EQUIPO EN ARRENDAMIENTO FINANCIERO'),
(23, '', 'DEPRECIACIÓN ACUMULADA DE PROPIEDAD PLANTA Y EQ. EN ARRENDAMIENTO FINANCIERO'),
(24, '', 'CONSTRUCCIÓN EN PROCESO'),
(25, '', 'INVERSIONES PERMANENTES'),
(26, '', 'IMPUESTO SOBRE LA RENTA DIFERIDO CUENTA DE ACTIVO'),
(27, '', 'ACTIVOS INTANGIBLES'),
(28, '', 'AMORTIZACIÓN DE INTANGIBLES'),
(29, '', 'DETERIORO ACUMULADO DE ACTIVOS INTANGIBLES'),
(30, '', 'CUENTAS Y DOCUMENTOS POR COBRAR LARGO PLAZO'),
(31, '', 'PRÉSTAMOS A ACCIONISTAS LARGO PLAZO'),
(32, '', 'OTRAS CUENTAS POR COBRAR LARGO PLAZO'),
(33, '', 'DEPOSITOS EN GARANTIA LARGO PLAZO'),
(34, '', 'CUENTAS POR COBRAR ARRENDAMIENTO FINANCIERO LARGO PLAZO'),
(35, '', 'PARTES RELACIONADAS LARGO PLAZO'),
(36, '', 'PASIVO'),
(37, '', 'PASIVO CORRIENTE'),
(38, '', 'PRÉSTAMOS Y SOBREGIROS BANCARIOS'),
(39, '', 'CUENTAS Y DOCUMENTOS POR PAGAR'),
(40, '', 'PORCIÓN CIRCULANTE DE ARRENDAMIENTO FINANCIERO LARGO PLAZO'),
(41, '', 'PROVISIONES Y RETENCIONES');
(42, '', 'BENEFICIOS A EMPLEADOS POR PAGAR');
(43, '', 'ACREEDORES VARIOS');
(44, '', 'DIVIDENDOS POR PAGAR');
(45, '', 'IVA - DÉBITO FISCAL');
(46, '', 'IMPUESTOS POR PAGAR');
(47, '', 'INTERESES POR PAGAR');
(48, '', 'PARTES RELACIONADAS CORTO PLAZO');
(49, '', 'PASIVO NO CORRIENTE');
(50, '', 'PRÉSTAMOS BANCARIOS A LARGO PLAZO');
(51, '', 'DOCUMENTOS POR PAGAR - LARGO PLAZO');
(52, '', 'OBLIGACIONES POR ARRENDAMIENTO FINANCIERO LARGO PLAZO');
(53, '', 'IMPUESTO SOBRE LA RENTA DIFERIDO CUENTA PASIVO');
(54, '', 'BENEFICIOS A EMPLEADOS POR PAGAR A LARGO PLAZO');
(55, '', 'PARTES RELACIONADAS LARGO PLAZO');
(56, '', 'PATRIMONIO');
(57, '', 'CAPITAL CONTABLE');
(58, '', 'CAPITAL SOCIAL');
(59, '', 'SUPERAVIT POR REVALUACIÓN DE PROPIEDAD PLANTA Y EQUIPO NO REALIZADA');
(60, '', 'RESERVA LEGAL');
(61, '', 'UTILIDADES POR DISTRIBUIR');
(62, '', 'SUPERAVIT POR REVALUACIÓN DE PROPIEDAD PLANTA Y EQUIPO REALIZADO');
(63, '', 'DEFICIT ACUMULADO');
(64, '', 'CUENTAS DE RESULTADO DEUDORAS');
(65, '', 'COSTOS Y GASTOS DE OPERACIÓN');
(66, '', 'COSTO DE VENTA');
(67, '', 'GASTOS DE VENTA');
(68, '', 'GASTOS DE ADMINISTRACIÓN');
(69, '', 'IMPUESTO SOBRE LA RENTA');
(70, '', 'GASTOS FINANCIEROS');
(71, '', 'PÉRDIDA POR VENTA DE ACTIVOS NO CORRIENTES MANTENIDOS PARA LA VENTA');
(72, '', 'CUENTAS DE RESULTADO ACREEDORAS');
(73, '', 'INGRESOS OPERATIVOS');
(74, '', 'INGRESOS POR VENTAS');
(75, '', 'PRODUCTOS FINANCIEROS');
(76, '', 'PÉRDIDA POR VENTA DE ACTIVOS NO CORRIENTES MANTENIDOS PARA LA VENTA');
(77, '', 'CUENTA LIQUIDADORA O DE CIERRE');
(78, '', 'CUENTA LIQUIDADORA O DE CIERRE');
(79, '', 'PÉRDIDAS Y GANANCIAS');
(80, '', 'CUENTAS DE MEMORANDUM DEUDORAS');
(81, '', 'CUENTAS DE ORDEN DEUDORAS');
(82, '', 'CUENTAS DE ORDEN DEUDORAS');
(83, '', 'CUENTAS DE MEMORANDUM ACREEDORAS');
(84, '', 'CUENTAS DE ORDEN ACREEDORAS');
(85, '', 'CUENTAS DE ORDEN ACREEDORAS');




INSERT INTO `subcuenta_primarias` (`id_subcuenta_primaria`, `id_cuenta_mayor`, `codigo_subcuenta_primaria`, `nombre_subcuenta_primaria`) VALUES
(1, 3, '', 'Caja General'),
(2, 3, '', 'Caja Chica'),
(3, 3, '', 'Bancos'),
(4, 3, '', 'Equivalentes de Efectivo'),
(5, 4, '', 'Clientes'),
(6, 4, '', 'Estimación Para Cuentas Incobrables'),
(7, 4, '', 'Documentos Por Cobrar'),
(8, 4, '', 'Otras Cuentas por Cobrar'),
(9, 4, '', 'Préstamos a Empleados'),
(10, 4, '', 'Anticipos Sobre Sueldos'),
(11, 4, '', 'Faltantes de Caja'),
(12, 4, '', 'Cheques Rechazados'),
(13, 4, '', 'Préstamos a Accionistas'),
(14, 5, '', 'Arrendamiento Financiero Por Cobrar'),
(15, 5, '', 'Estimación Para Cuentas Incobrables de Arrendamiento Financiero'),
(16, 6, '', 'Artículos Para El Hogar'),
(17, 9, '', 'Acciones'),
(18, 9, '', 'Bonos'),
(19, 10, '', 'Directores, Ejecutivos y Empleados'),
(20, 10, '', 'Compañías Afiliadas'),
(21, 10, '', 'Compañías Asociadas'),
(22, 10, '', 'Compañías Subsidiarias'),
(23, 11, '', 'Alquileres'),
(24, 11, '', 'Seguros y Fianzas'),
(25, 11, '', 'Propaganda y Publicidad'),
(26, 11, '', 'Intereses'),
(27, 11, '', 'Papelería'),
(28, 11, '', 'Membresías y Suscripciones'),
(29, 11, '', 'Otros'),
(30, 12, '', 'Crédito Fiscal - IVA'),
(31, 17, '', 'Terrenos'),
(32, 17, '', 'Edificios'),
(33, 17, '', 'Equipo de Transporte'),
(34, 17, '', 'Mobiliario y Equipo de Oficina'),
(35, 17, '', 'Otros Activos Fijos'),
(36, 18, '', 'Depreciación Acumulada de Edificios'),
(37, 18, '', 'Depreciación Acumulada de Equipo de Transporte'),
(38, 18, '', 'Depreciación Acumulada de Mobiliario y Equipo de Oficina'),
(39, 18, '', 'Depreciación Acumulada de Otros Activos Fijos'),
(40, 19, '', 'Terrenos'),
(41, 19, '', 'Edificios'),
(42, 19, '', 'Equipo de Transporte'),
(43, 19, '', 'Mobiliario y Equipo de Oficina'),
(44, 19, '', 'Otros Activos Fijos'),
(45, 20, '', 'Revaluaciones de Terreno'),
(46, 20, '', 'Revaluaciones de Edificios'),
(47, 21, '', 'Revaluaciones de Terreno'),
(48, 21, '', 'Revaluaciones de Edificios'),
(49, 22, '', 'Terrenos'),
(50, 22, '', 'Edificios'),
(51, 22, '', 'Equipo de Transporte'),
(52, 22, '', 'Mobiliario y Equipo de Oficina'),
(53, 22, '', 'Otros Activos Fijos en Arrendamiento Financiero'),
(54, 23, '', 'Depreciación de Edificios'),
(55, 23, '', 'Depreciación de Equipo de Transporte'),
(56, 23, '', 'Depreciación de Mobiliario Y Equipo de Oficina'),
(57, 23, '', 'Depreciación de Otros Activos Fijos en Arrendamiento Financiero'),
(58, 25, '', 'Inversiones en Subsidiarias'),
(59, 25, '', 'Inversiones en Asociadas'),
(60, 25, '', 'Inversiones en Negocios Conjuntos'),
(61, 27, '', 'Derecho de Llave'),
(62, 27, '', 'Patentes y Marcas'),
(63, 27, '', 'Licencias'),
(64, 27, '', 'Programas y Sistemas'),
(65, 28, '', 'Derecho de Llave'),
(66, 28, '', 'Patentes y Marcas'),
(67, 28, '', 'Licencias'),
(68, 28, '', 'Programas y Sistemas'),
(69, 29, '', 'Derecho de Llave'),
(70, 29, '', 'Patentes y Marcas'),
(71, 29, '', 'Licencias'),
(72, 29, '', 'Programas y Sistemas'),
(73, 30, '', 'Cuentas por Cobrar Comerciales Largo Plazo'),
(74, 30, '', 'Estimación para Cuentas Incobrables Largo Plazo'),
(75, 30, '', 'Préstamos al Personal Largo Plazo'),
(76, 34, '', 'Arrendamiento Financiero Lago Plazo'),
(77, 34, '', 'Estimación para Cuentas Incobrables Arrendamiento Financiero'),
(78, 35, '', 'Directores, Ejecutivos y Empleados Largo Plazo'),
(79, 35, '', 'Compañías Afiliadas Largo Plazo'),
(80, 35, '', 'Compañías Asociadas Largo Plazo'),
(81, 35, '', 'Compañías Subsidiarias Largo Plazo'),
(82, 38, '', 'Préstamos Bancarios Corto Plazo'),
(83, 38, '', 'Sobregiros Bancarios'),
(84, 39, '', 'Proveedores'),
(85, 39, '', 'Documentos por Pagar'),
(86, 39, '', 'Letras de Cambio'),
(87, 40, '', 'Obligación por Arrendamiento Financiero Largo Plazo.'),
(88, 41, '', 'Provisiones'),
(89, 41, '', 'Retenciones');
(90, 42, '', 'Beneficios a Empleados Por Pagar');
(91, 43, '', 'Compra de Bienes Muebles e Inmuebles');
(92, 43, '', 'Otros');
(93, 45, '', 'Débito Fiscal - IVA');
(94, 46, '', 'IVA Por Pagar');
(95, 46, '', 'Impuesto Sobre la Renta Corriente');
(96, 46, '', 'Pago a Cuenta');
(97, 46, '', 'Impuestos Municipales');
(98, 47, '', 'Intereses por Préstamos a Bancarios');
(99, 47, '', 'Intereses por Pagos Tardíos');
(100, 48, '', 'Directores, Ejecutivos y Empleados Corto Plazo');
(101, 48, '', 'Compañías Afiliadas');
(102, 48, '', 'Compañías Asociadas');
(103, 48, '', 'Compañías Subsidiarias');
(104, 50, '', 'Préstamos Hipotecarios a Largo Plazo');
(105, 51, '', 'Contratos a Largo Plazo');
(106, 51, '', 'Pagarés');
(107, 51, '', 'Letras de Cambio');
(108, 52, '', 'Contratos Bajo Arrendamiento Financiero Largo Plazo');
(109, 53, '', 'Impuesto sobre la Renta de Años Anteriores');
(110, 54, '', 'Beneficios por Terminación de Empleos por Pagar');
(111, 55, '', 'Directores, Ejecutivos y Empleados Largo Plazo');
(112, 55, '', 'Compañías Afiliadas');
(113, 55, '', 'Compañías Asociadas');
(114, 55, '', 'Compañías Subsidiarias');
(115, 58, '', 'Capital Social Suscrito');
(116, 58, '', 'Capital Social no Pagado');
(117, 61, '', 'Utilidades de Ejercicios Anteriores');
(118, 61, '', 'Utilidad del Ejercicio');
(119, 63, '', 'Pérdidas de Ejercicios Anteriores');
(120, 63, '', 'Pérdidas del Ejercicio Corriente');
(121, 66, '', 'Artículos Para El Hogar');
(122, 67, '', 'Sueldos y Salarios');
(123, 67, '', 'Horas Extras');
(124, 67, '', 'Honorarios');
(125, 67, '', 'Vacaciones');
(126, 67, '', 'Aguinaldos');
(127, 67, '', 'Bonificaciones');
(128, 67, '', 'Incapacidades');
(129, 67, '', 'Indemnizaciones');
(130, 67, '', 'Seguros de Vida');
(131, 67, '', 'Comisiones');
(132, 67, '', 'Cuota Patronal - ISSS');
(133, 67, '', 'Cuota Patronal Fondo de Pensiones');
(134, 67, '', 'Cuota Patronal INSAFORP');
(135, 67, '', 'Pasajes y Viáticos');
(136, 67, '', 'Transporte');
(137, 67, '', 'Papelería y Útiles');
(138, 67, '', 'Impuestos Municipales');
(139, 67, '', 'Estimación para Cuentas Incobrables');
(140, 67, '', 'Depreciación de Propiedad Planta y Equipo');
(141, 67, '', 'Depreciación por Arrendamiento Financiero');
(142, 67, '', 'Seguro de Vehículos');
(143, 67, '', 'Combustible y Lubricantes');
(144, 67, '', 'Mantenimiento de Vehículos');
(145, 67, '', 'Mantenimiento de Mobiliario y Equipo');
(146, 67, '', 'Mantenimiento de Locales');
(147, 67, '', 'Alquileres de Estacionamiento');
(148, 67, '', 'Artículos de Aseo y Limpieza');
(149, 67, '', 'Tarjeta de Circulación de Vehículos');
(150, 67, '', 'Servicios de Correo');
(151, 67, '', 'Herramientas, Repuestos y Accesorios');
(152, 67, '', 'Atención al Personal');
(153, 67, '', 'Material de Empaque');
(154, 67, '', 'Propaganda y Publicidad');
(155, 67, '', 'Amortización de Intangibles');
(156, 67, '', 'Seguridad Privada');
(157, 67, '', 'Donaciones');
(158, 67, '', 'Capacitaciones');
(159, 67, '', 'Gastos por Obsolescencia');
(160, 67, '', 'Fletes');
(161, 67, '', 'Otros');
(162, 68, '', 'Sueldos y Salarios');
(163, 68, '', 'Horas Extras');
(164, 68, '', 'Honorarios');
(165, 68, '', 'Dietas');
(166, 68, '', 'Vacaciones');
(167, 68, '', 'Aguinaldos');
(168, 68, '', 'Bonificaciones');
(169, 68, '', 'Incapacidades');
(170, 68, '', 'Indemnizaciones');
(171, 68, '', 'Seguros de Vida');
(172, 68, '', 'Cuota Patronal - ISSS');
(173, 68, '', 'Cuota Patronal Fondo de Pensiones');
(174, 68, '', 'Cuota Patronal INSAFORP');
(175, 68, '', 'Pasajes y Viáticos');
(176, 68, '', 'Transporte');
(177, 68, '', 'Papelería y Útiles');
(178, 68, '', 'Impuestos Municipales');
(179, 68, '', 'Depreciación de Propiedad Planta y Equipo');
(180, 68, '', 'Depreciación por Arrendamiento Financiero');
(181, 68, '', 'Seguro de Vehículos');
(182, 68, '', 'Combustible y Lubricantes');
(183, 68, '', 'Mantenimiento de Vehículos');
(184, 68, '', 'Mantenimiento de Mobiliario y Equipo');
(185, 68, '', 'Mantenimiento de Establecimiento');
(186, 68, '', 'Artículos de Aseo y Limpieza');
(187, 68, '', 'Tarjeta de Circulación de Vehículos');
(188, 68, '', 'Servicios de Correo');
(189, 68, '', 'Herramientas, Repuestos y Accesorios');
(190, 68, '', 'Atención al Personal');
(191, 68, '', 'Amortización de Intangibles');
(192, 68, '', 'Seguridad Privada');
(193, 68, '', 'Donaciones');
(194, 68, '', 'Capacitaciones');
(195, 68, '', 'Otros');
(196, 69, '', 'Impuesto sobre la Renta Corriente');
(197, 69, '', 'Impuesto sobre la Renta Diferido - Activo');
(198, 69, '', 'Impuesto sobre la Renta Diferido - Pasivo');
(199, 70, '', 'Intereses');
(200, 70, '', 'Comisiones Bancarias');
(201, 70, '', 'Descuentos');
(202, 70, '', 'Otros');
(203, 74, '', 'Artículos Para El Hogar');
(204, 75, '', 'Intereses Bancarios');
(205, 75, '', 'Comisiones');
(206, 75, '', 'Descuentos');
(207, 75, '', 'Diferenciales Cambiarios');
(208, 75, '', 'Otros Productos Financieros');



INSERT INTO `subcuenta_secundarias` (`id_subcuenta_secundaria`, `id_subcuenta_primaria`, `codigo_subcuenta_secundaria`, `nombre_subcuenta_secundaria`) VALUES
(1, 3, '', 'Cuenta Corriente'),
(2, 3, '', 'Cuenta de Ahorro'),
(3, 3, '', 'Depósitos a Plazo Menos de un Año'),
(4, 4, '', 'Reportos'),
(5, 16, '', 'Decoración'),
(6, 16, '', 'Limpieza'),
(7, 16, '', 'Cocina'),
(8, 16, '', 'Muebles'),
(9, 16, '', 'Otros'),
(10, 61, '', 'Costo de Adquisición Derecho de Llave'),
(11, 62, '', 'Costo de Adquisición Patentes y Marcas'),
(12, 63, '', 'Costo de Adquisición de Licencias'),
(13, 64, '', 'Costo de Adquisición de Programas y Sistemas'),
(14, 82, '', 'Banco Agrícola'),
(15, 82, '', 'Banco Citibank'),
(16, 83, '', 'Banco Agrícola'),
(17, 83, '', 'Banco Citibank'),
(18, 83, '', 'Préstamos de Accionistas'),
(19, 83, '', 'Porción Circulante de Préstamos a Largo Plazo'),
(20, 84, '', 'Proveedores Locales'),
(21, 84, '', 'Proveedores del Exterior'),
(22, 85, '', 'Contratos a Corto Plazo'),
(23, 85, '', 'Pagarés'),
(24, 88, '', 'ISSS'),
(25, 88, '', 'AFP Crecer'),
(26, 88, '', 'AFP Confía'),
(27, 88, '', 'IPSFA'),
(28, 88, '', 'INSAFORP'),
(29, 88, '', 'INPEP'),
(30, 88, '', 'Anda'),
(31, 88, '', 'Clessa'),
(32, 88, '', 'Telecomunicaciones'),
(33, 88, '', 'Alquileres'),
(34, 88, '', 'Otros'),
(35, 89, '', 'ISSS'),
(36, 89, '', 'AFP Crecer'),
(37, 89, '', 'AFP Confía'),
(38, 89, '', 'IPSFA'),
(39, 89, '', 'INPEP'),
(40, 89, '', 'Impuesto sobre la Renta Permanentes'),
(41, 89, '', 'Impuesto sobre la Renta Eventuales'),
(42, 89, '', 'Préstamos Bancarios'),
(43, 89, '', 'Procuraduría'),
(44, 89, '', 'Otras Retenciones');
(45, 90, '', 'Planillas Por Pagar');
(46, 90, '', 'Comisiones');
(47, 90, '', 'Bonificaciones');
(48, 90, '', 'Vacaciones');
(49, 90, '', 'Aguinaldos');
(50, 90, '', 'Otros');
(51, 91, '', 'Bienes Muebles');
(52, 91, '', 'Bienes Inmuebles');
(53, 110, '', 'Indemnizaciones por Pagar');
(54, 115, '', 'Capital Social Mínimo');
(55, 115, '', 'Capital Social Variable');
(56, 116, '', 'Capital Social Mínimo');
(57, 116, '', 'Capital Social Variable');
(58, 121, '', 'Decoración');
(59, 121, '', 'Limpieza');
(60, 121, '', 'Cocina');
(61, 121, '', 'Muebles');
(62, 121, '', 'Otros');
(63, 203, '', 'Decoración');
(64, 203, '', 'Limpieza');
(65, 203, '', 'Cocina');
(66, 203, '', 'Muebles');
(67, 203, '', 'Otros');



INSERT INTO `subcuenta_terciarias` (`id_subcuenta_terciaria`, `id_subcuenta_secundaria`, `codigo_subcuenta_terciaria`, `nombre_subcuenta_terciaria`) VALUES
(1, 1, '', 'Banco Agrícola'),
(2, 1, '', 'Banco Citibank'),
(3, 2, '', 'Banco Agrícola'),
(4, 2, '', 'Banco Citibank'),
(5, 3, '', 'Banco Agrícola'),
(6, 3, '', 'Banco Citibank');
