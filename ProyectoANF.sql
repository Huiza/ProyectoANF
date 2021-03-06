INSERT INTO `tipo_cuentas` (`id_tipo_cuenta`,`nombre_tipo_cuenta`) VALUES
(1,'ACTIVO'),
(2,'PASIVO'),
(3,'PATRIMONIO'),
(4,'GASTOS'),
(5,'INGRESOS');

INSERT INTO `cuentas` (`id_cuenta`, `id_tipo_cuenta`, `cuenta_ratios`, `nombre_cuenta`) VALUES
(1, 1, 1, 'ACTIVO'),
(2, 1, 1, 'ACTIVO CORRIENTE'),
(3, 1, 1, 'Efectivo Y Equivalentes De Efectivo'),
(4, 1, 0, 'Caja General'),
(5, 1, 0, 'Caja Chica'),
(6, 1, 0,'Bancos'),
(7, 1, 0,'Cuenta Corriente'),
(8, 1, 0,'Cuenta De Ahorro'),
(9, 1, 0,'Depósitos A Plazo Menos De Un Año'),
(10, 1, 1,'Valores De Corto Plazo'),
(11, 1, 0,'Equivalentes De Efectivo'),
(12, 1, 0,'Reportos'),
(13, 1, 0,'Cuentas Y Documentos Por Cobrar'),
(14, 1, 0,'Clientes'),
(15, 1, 0,'Estimación Para Cuentas Incobrables'),
(16, 1, 0,'Documentos Por Cobrar'),
(17, 1, 0,'Otras Cuentas Por Cobrar'),
(18, 1, 0,'Préstamos A Empleados'),
(19, 1, 0,'Anticipos Sobre Sueldos'),
(20, 1, 0,'Faltantes De Caja'),
(21, 1, 0,'Cheques Rechazados'),
(22, 1, 0,'Préstamos A Accionistas'),
(23, 1, 0,'Cuentas Por Cobrar Arrendamiento Financiero'),
(24, 1, 0,'Arrendamiento Financiero Por Cobrar'),
(25, 1, 0,'Estimación Para Cuentas Incobrables De Arrendamiento Financiero'),
(26, 1, 1,'Inventarios'),
(27, 1, 0,'Pedidos En Transito'),
(28, 1, 0,'Reserva Para Obsolescencia De Inventarios'),
(29, 1, 1,'Cuentas Por Cobrar Comerciales'),
(30, 1, 0,'Acciones'),
(31, 1, 0,'Bonos'),
(32, 1, 0,'Gastos Pagados Por Anticipado'),
(33, 1, 0,'Directores, Ejecutivos Y Empleados'),
(34, 1, 0,'Compañías Afiliadas'),
(35, 1, 0,'Compañías Asociadas'),
(36, 1, 0,'Compañías Subsidiarias'),
(37, 1, 0,'Alquileres'),
(38, 1, 0,'Seguros Y Fianzas'),
(39, 1, 0,'Propaganda Y Publicidad'),
(40, 1, 0,'Intereses'),
(41, 1, 0,'Papelería'),
(42, 1, 0,'Membresías Y Suscripciones'),
(43, 1, 0,'IVA- Crédito Fiscal'),
(44, 1, 0,'Crédito Fiscal - IVA'),
(45, 1, 0,'Pago A Cuenta-Impuesto Sobre Renta'),
(46, 1, 0,'Dividendos Por Cobrar'),
(47, 1, 0,'Activos No Corrientes Mantenidos Para La Venta'),
(48, 1, 0,'ACTIVO NO CORRIENTE'),
(49, 1, 1,'Activo Fijo Neto'),
(50, 1, 0,'Propiedad Planta Y Equipo'),
(51, 1, 0,'Terrenos'),
(52, 1, 0,'Edificios'),
(53, 1, 0,'Equipo De Transporte'),
(54, 1, 0,'Mobiliario Y Equipo De Oficina'),
(55, 1, 0,'Otros Activos Fijos'),
(56, 1, 0,'Depreciación Acumulada De Propiedad Planta Y Equipo'),
(57, 1, 0,'Depreciación Acumulada De Edificios'),
(58, 1, 0,'Depreciación Acumulada De Equipo De Transporte'),
(59, 1, 0,'Depreciación Acumulada De Mobiliario Y Equipo De Oficina'),
(60, 1, 0,'Depreciación Acumulada De Otros Activos Fijos'),
(61, 1, 0,'Deterioro Acumulado De Propiedad Planta Y Equipo'),
(62, 1, 0,'Revaluación De Propiedad Planta Y Equipo'),
(63, 1, 0,'Revaluaciones De Terreno'),
(64, 1, 0,'Revaluaciones De Edificios'),
(65, 1, 0,'Depreciación De Revaluos De Propiedad Planta Y Equipo'),
(66, 1, 0,'Propiedad Planta Y Equipo En Arrendamiento Financiero'),
(67, 1, 0,'Otros Activos Fijos En Arrendamiento Financiero'),
(68, 1, 0,'Depreciación Acumulada De Propiedad Planta Y Equipo En Arrendamiento Financiero'),
(69, 1, 0,'Depreciación De Edificios'),
(70, 1, 0,'Depreciación De Equipo De Transporte'),
(71, 1, 0,'Depreciación De Mobiliario Y Equipo De Oficina'),
(72, 1, 0,'Depreciación De Otros Activos Fijos En Arrendamiento Financiero'),
(73, 1, 0,'Construcción En Proceso'),
(74, 1, 1,'Inversiones'),
(75, 1, 0,'Inversiones Temporales'),
(76, 1, 0,'Inversiones Permanentes'),
(77, 1, 0,'Inversiones En Negocios Conjuntos'),
(78, 1, 0,'Impuesto Sobre La Renta Diferido Cuenta De Activo'),
(79, 1, 0,'Activos Intangibles'),
(80, 1, 0,'Derecho De Llave'),
(81, 1, 0,'Costo De Adquisición Derecho De Llave'),
(82, 1, 0, 'Patentes Y Marcas'),
(83, 1, 0,'Costo De Adquisición Patentes Y Marcas'),
(84, 1, 0,'Licencias'),
(85, 1, 0,'Costo De Adquisición De Licencias'),
(86, 1, 0,'Programas Y Sistemas'),
(87, 1, 0,'Costo De Adquisición De Programas Y Sistemas'),
(88, 1, 0,'Amortización De Intangibles'),
(89, 1, 0,'Deterioro Acumulado De Activos Intangibles'),
(90, 1, 0,'Cuentas Y Documentos Por Cobrar Largo Plazo'),
(91, 1, 0,'Estimación Para Cuentas Incobrables Largo Plazo'),
(92, 1, 0,'Préstamos Al Personal Largo Plazo'),
(93, 1, 0,'Préstamos A Accionistas Largo Plazo'),
(94, 1, 0,'Otras Cuentas Por Cobrar Largo Plazo'),
(95, 1, 0,'Depositos En Garantia Largo Plazo'),
(96, 1, 0,'Cuentas Por Cobrar Arrendamiento Financiero Largo Plazo'),
(97, 1, 0,'Arrendamiento Financiero Lago Plazo'),
(98, 1, 0,'Directores, Ejecutivos Y Empleados Largo Plazo'),
(99, 1, 0,'Compañías Afiliadas Largo Plazo'),
(100, 1, 0,'Compañías Asociadas Largo Plazo'),
(101, 1, 0,'Compañías Subsidiarias Largo Plazo'),
(102, 2, 1,'PASIVO'),
(103, 2, 1,'PASIVO CORRIENTE'),
(104, 2, 0,'Préstamos Y Sobregiros Bancarios'),
(105, 2, 0,'Préstamos Bancarios Corto Plazo'),
(106, 2, 0,'Sobregiros Bancarios'),
(107, 2, 0,'Préstamos De Accionistas'),
(108, 2, 0,'Porción Circulante De Préstamos A Largo Plazo'),
(109, 2, 0,'Cuentas Y Documentos Por Pagar'),
(110, 2, 0,'Proveedores'),
(111, 2, 1,'Cuentas Por Pagar Comerciales'),
(112, 2, 0,'Documentos Por Pagar'),
(113, 2, 0,'Contratos A Corto Plazo'),
(114, 2, 0,'Pagarés A Corto Plazo'),
(115, 2, 0,'Letras De Cambio A Corto Plazo'),
(116, 2, 0,'Porción Circulante De Arrendamiento Financiero Largo Plazo'),
(117, 2, 0,'Obligación Por Arrendamiento Financiero Largo Plazo.'),
(118, 2, 0,'Provisiones'),
(119, 2, 0,'ISSS'),
(120, 2, 0,'AFP'),
(121, 2, 0,'IPSFA'),
(122, 2, 0,'INSAFORP'),
(123, 2, 0,'INPEP'),
(124, 2, 0,'ANDA'),
(125, 2, 0,'CLESSA'),
(126, 2, 0,'Telecomunicaciones'),
(127, 2, 0,'Alquileres'),
(128, 2, 0,'Retenciones'),
(129, 2, 0,'Impuesto Sobre La Renta Permanentes'),
(130, 2, 0,'Impuesto Sobre La Renta Eventuales'),
(131, 2, 0,'Préstamos Bancarios'),
(132, 2, 0,'Procuraduría'),
(133, 2, 0,'Otras Retenciones'),
(134, 2, 0,'Beneficios A Empleados Por Pagar'),
(135, 2, 0,'Planillas Por Pagar'),
(136, 2, 0,'Comisiones'),
(137, 2, 0,'Bonificaciones'),
(138, 2, 0,'Vacaciones'),
(139, 2, 0,'Aguinaldos'),
(140, 2, 0,'Acreedores Varios'),
(141, 2, 0,'Bienes Muebles'),
(142, 2, 0,'Bienes Inmuebles'),
(143, 2, 0,'Dividendos Por Pagar'),
(144, 2, 0,'IVA - Débito Fiscal'),
(145, 2, 0,'Débito Fiscal - IVA'),
(146, 2, 0,'Impuestos Por Pagar'),
(147, 2, 0,'IVA Por Pagar'),
(148, 2, 0,'Impuesto Sobre La Renta Corriente'),
(149, 2, 0,'Pago A Cuenta'),
(150, 2, 0,'Impuestos Municipales'),
(151, 2, 0,'Intereses Por Pagar'),
(152, 2, 0,'Intereses Por Préstamos A Bancarios'),
(153, 2, 0,'Intereses Por Pagos Tardíos'),
(154, 2, 0,'Directores, Ejecutivos Y Empleados Corto Plazo'),
(155, 2, 0,'Compañías Afiliadas'),
(156, 2, 0,'Compañías Asociadas'),
(157, 2, 0,'Compañías Subsidiarias'),
(158, 2, 0,'PASIVO NO CORRIENTE'),
(159, 2, 0,'Préstamos Bancarios A Largo Plazo'),
(160, 2, 0,'Préstamos Hipotecarios A Largo Plazo'),
(161, 2, 0,'Documentos Por Pagar - Largo Plazo'),
(162, 2, 0,'Contratos A Largo Plazo'),
(163, 2, 0,'Pagarés A Largo Plazo'),
(164, 2, 0,'Letras De Cambio A Largo Plazo'),
(165, 2, 0,'Obligaciones Por Arrendamiento Financiero Largo Plazo'),
(166, 2, 0,'Contratos Bajo Arrendamiento Financiero Largo Plazo'),
(167, 2, 0,'Impuesto Sobre La Renta Diferido Cuenta Pasivo'),
(168, 2, 0,'Impuesto Sobre La Renta De Años Anteriores'),
(169, 2, 0,'Beneficios A Empleados Por Pagar A Largo Plazo'),
(170, 2, 0,'Beneficios Por Terminación De Empleos Por Pagar'),
(171, 2, 0,'Indemnizaciones Por Pagar'),
(172, 3, 1,'PATRIMONIO'),
(173, 3, 1,'CAPITAL CONTABLE'),
(174, 3, 0,'Capital Social'),
(175, 3, 0,'Capital Social Suscrito'),
(176, 3, 0,'Capital Social Mínimo'),
(177, 3, 0,'Capital Social Variable'),
(178, 3, 0,'Capital Social No Pagado'),
(179, 3, 0,'Superavit Por Revaluación De Propiedad Planta Y Equipo No Realizada'),
(180, 3, 0,'Reserva Legal'),
(181, 3, 1,'Utilidad Bruta'),
(182, 3, 1,'Utilidades Antes De Impuesto'),
(183, 3, 1,'Utilidad Operativa'),
(184, 3, 0,'Superavit Por Revaluación De Propiedad Planta Y Equipo Realizado'),
(185, 3, 0,'Deficit Acumulado'),
(186, 3, 0,'Pérdidas De Ejercicios Anteriores'),
(187, 3, 0,'Pérdidas Del Ejercicio Corriente'),
(188, 4, 1,'GASTOS'),
(189, 4, 0,'COSTOS Y GASTOS DE OPERACION'),
(190, 4, 1,'Costo De Venta'),
(191, 4, 1,'Compras'),
(192, 4, 0,'Sueldos Y Salarios'),
(193, 4, 0,'Horas Extras'),
(194, 4, 0,'Honorarios'),
(195, 4, 0,'Incapacidades'),
(196, 4, 0,'Indemnizaciones'),
(197, 4, 0,'Seguros De Vida'),
(198, 4, 0,'Comisiones'),
(199, 4, 0,'Cuota Patronal - ISSS'),
(200, 4, 0,'Cuota Patronal Fondo De Pensiones'),
(201, 4, 0,'Cuota Patronal INSAFORP'),
(202, 4, 0,'Pasajes Y Viáticos'),
(203, 4, 0,'Transporte'),
(204, 4, 0,'Papelería Y Útiles'),
(205, 4, 0,'Impuestos Municipales'),
(206, 4, 0,'Estimación Para Cuentas Incobrables'),
(207, 4, 0,'Depreciación De Propiedad Planta Y Equipo'),
(208, 4, 0,'Depreciación Por Arrendamiento Financiero'),
(209, 4, 0,'Seguro De Vehículos'),
(210, 4, 0,'Combustible Y Lubricantes'),
(211, 4, 0,'Mantenimiento De Vehículos'),
(212, 4, 0,'Mantenimiento De Mobiliario Y Equipo'),
(213, 4, 0,'Mantenimiento De Locales'),
(214, 4, 0,'Alquileres De Estacionamiento'),
(215, 4, 0,'Artículos De Aseo Y Limpieza'),
(216, 4, 0,'Tarjeta De Circulación De Vehículos'),
(217, 4, 0,'Servicios De Correo'),
(218, 4, 0,'Herramientas, Repuestos Y Accesorios'),
(219, 4, 0,'Atención Al Personal'),
(220, 4, 0,'Material De Empaque'),
(221, 4, 0,'Propaganda Y Publicidad'),
(222, 4, 0,'Amortización De Intangibles'),
(223, 4, 0,'Seguridad Privada'),
(224, 4, 0,'Donaciones'),
(225, 4, 0,'Capacitaciones'),
(226, 4, 0,'Gastos Por Obsolescencia'),
(227, 4, 0,'Fletes'),
(228, 4, 0,'Gastos De Administración'),
(229, 4, 0,'Dietas'),
(230, 4, 0,'Seguro De Vehículos'),
(231, 4, 0,'Mantenimiento De Establecimiento'),
(232, 4, 0,'Amortización De Intangibles'),
(233, 4, 0,'Impuesto Sobre La Renta'),
(234, 4, 0,'Impuesto Sobre La Renta Corriente'),
(235, 4, 0,'Impuesto Sobre La Renta Diferido - Activo'),
(236, 4, 0,'Impuesto Sobre La Renta Diferido - Pasivo'),
(237, 4, 1,'Gastos Financieros'),
(238, 4, 0,'Intereses'),
(239, 4, 0,'Comisiones Bancarias'),
(240, 4, 0,'Descuentos'),
(241, 4, 0,'Pérdida Por Venta De Activos No Corrientes Mantenidos Para La Venta'),
(242, 5, 1,'INGRESOS'),
(243, 5, 0,'INGRESOS DE OPERACION'),
(244, 5, 1,'Ventas Netas'),
(245, 5, 0,'Productos Financieros'),
(246, 5, 0,'Intereses Bancarios'),
(247, 5, 0,'Comisiones'),
(248, 5, 0,'Descuentos'),
(249, 5, 0,'Diferenciales Cambiarios'),
(250, 5, 0,'Otros Productos Financieros'),
(251, 6, 0,'CUENTA LIQUIDADORA O DE CIERRE'),
(252, 6, 0,'Pérdidas Y Ganancias');

INSERT INTO `tipos` (`id`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Comercial', NULL, NULL),
(2, 'Extractiva', NULL, NULL),
(3, 'Financiera', NULL, NULL),
(4, 'Industrial', NULL, NULL),
(5, 'Servicio', NULL, NULL);


INSERT INTO `tipo_estado_financieros` (`id_tipo_estado_financiero`,`tipo_estado_financiero`) VALUES
(1,'Balance general'),
(2,'Estado de resultados');

INSERT INTO `tipo_ratios` (`id`, `nombre_tipo_ratio`) VALUES
(1,'Razones de liquidez'),
(2,'Razones de actividad'),
(3,'Razones de apalancamiento'),
(4,'Razones de rentabilidad');
