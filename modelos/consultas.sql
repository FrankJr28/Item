ALTER TABLE pres_lap ADD FOREIGN KEY (id_l) REFERENCES laptop (id_l);
ALTER TABLE pres_lap ADD FOREIGN KEY (id_pres) REFERENCES prestamo (id_pres) on DELETE cascade;

ALTER TABLE pres_boc ADD FOREIGN KEY (id_b) REFERENCES bocina (id_b)
ALTER TABLE pres_boc ADD FOREIGN KEY (id_pres) REFERENCES prestamo (id_pres) on DELETE cascade;

ALTER TABLE pres_cab ADD FOREIGN KEY (id_c) REFERENCES cable (id_c);
ALTER TABLE pres_cab ADD FOREIGN KEY (id_pres) REFERENCES prestamo (id_pres) ON DELETE cascade;

ALTER TABLE pres_proy ADD FOREIGN KEY (id_p) REFERENCES proyector (id_p);
ALTER TABLE pres_proy ADD FOREIGN KEY (id_pres) REFERENCES prestamo (id_pres) on DELETE cascade;

ALTER TABLE pres_adapt ADD FOREIGN KEY (id_a) REFERENCES adaptador (id_a);
ALTER TABLE pres_adapt ADD FOREIGN KEY (id_pres) REFERENCES prestamo (id_pres) ON DELETE cascade;

ALTER TABLE adaptadorentradas ADD FOREIGN KEY (id_a) REFERENCES adaptador (id_a)
ALTER TABLE adaptadorentradas ADD FOREIGN KEY (id_e) REFERENCES entrada (id_e)

ALTER TABLE prestamo ADD FOREIGN KEY (codigo_a) REFERENCES admin (codigo_a) on delete SET NULL

ALTER TABLE prestamo ADD FOREIGN KEY (codigo_u) REFERENCES usuario (codigo_u) on DELETE SET NULL


ALTER TABLE prestamo ADD FOREIGN KEY (id_ubi) REFERENCES ubicacion (id_ubi) on DELETE SET NULL


ALTER TABLE ubicacion ADD FOREIGN KEY (id_edi) REFERENCES edificio (id_edi) on DELETE SET NULL


ALTER TABLE usuario ADD FOREIGN KEY (id_car) REFERENCES carrera (id_car)

SELECT * FROM prestamo LEFT JOIN usuario ON prestamo.codigo_u = usuario.codigo_u 
WHERE prestamo.id_pres=:f

SELECT * FROM prestamo 
LEFT JOIN pres_proy on prestamo.id_pres = pres_proy.id_pres
LEFT JOIN proyector on pres_proy.id_p = pres_proy.id_p 
WHERE prestamo.id_pres=1

SELECT * FROM prestamo 
LEFT JOIN pres_lap on prestamo.id_pres = pres_lap.id_pres
LEFT JOIN laptop on pres_lap.id_l = laptop.id_l 
WHERE prestamo.id_pres=1

SELECT * FROM prestamo 
LEFT JOIN pres_boc on prestamo.id_pres = pres_boc.id_pres
LEFT JOIN bocina on pres_boc.id_b = bocina.id_b 
WHERE prestamo.id_pres=1

style="background:transparent; border:none; color:black"
e</b>:  Undefined variable: pres in <b>C:\xampp\htdocs\Item\vistas\paginas\detalleUsuario.php</b> on line <b>30</b><br /><br /><b>Notice</b>:  Trying to access array offset on value of type null in <b>C:\xampp\htdocs\Item\vistas\paginas\detalleUsuario.php</b> on line <b>30</b><br />

<br /><b>Notice</b>:  Trying to access array offset on value of type bool in <b>C:\xampp\htdocs\Item\vistas\paginas\detalleUsuario.php</b> on line <b>30</b><br />