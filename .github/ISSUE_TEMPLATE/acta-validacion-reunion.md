# Acta de reunión informal de validación – MR-[ID]

---

## 📅 Datos generales
- **Fecha:** DD/MM/AAAA  
- **Hora:** HH:MM (zona horaria)  
- **Medio:** Microsoft Teams  
- **Tipo de reunión:** Validación informal — seleccionar **Replicación de falla** o **Validación de sugerencia**  
- **Participantes:**  
  - **Líder de Proyecto (LP):** Nombre  
  - **Mantenedor:** Nombre  
  - **Otros asistentes:** Nombres

---

## 🎯 Objetivo
Validar, mediante demostración en entorno y revisión de evidencias, que la actividad realizada por el mantenedor (replicación de falla o validación de sugerencia) corresponde con lo documentado en las plantillas y determinar acciones a seguir.

---

## 📌 Escenario
- [ ] Replicación de falla  
- [ ] Validación de sugerencia de mejora

---

## 📥 Entradas revisadas
- **Registro de MR-[ID]** en Documentos Generados > MR-[ID] (Sección 1 y Sección 2).  
- **Plantillas y evidencias** adjuntas en el issue:  
  - Evidencia de instalación para el mantenimiento  
  - Replicación de falla mantenimiento (si aplica)  
  - Validación de sugerencia del mantenimiento (si aplica)  
- **Repositorio GitHub** y enlaces a archivos o logs relevantes.

---

## 📝 Desarrollo de la reunión
1. **Presentación del mantenedor**  
   - Resumen de la actividad realizada.  
   - Entorno utilizado (SO, versiones, navegador, contenedores, datos de prueba).

2. **Demostración en vivo**  
   - Pasos ejecutados en Teams.  
   - Evidencias mostradas: logs, capturas, mensajes de error, fragmentos de código.

3. **Revisión del LP**  
   - Comparación con la Evidencia de instalación.  
   - Comparación con la Replicación de falla o la Plantilla de validación de sugerencia.  
   - Observaciones sobre consistencias o discrepancias.

---

## ✅ Verificación técnica
- [ ] ¿La ejecución mostrada coincide con la Evidencia de instalación?  
- [ ] ¿Las evidencias coinciden con lo documentado en la plantilla correspondiente?  
- [ ] En caso de sugerencia, ¿se verificó que no existe implementación duplicada?  
- [ ] ¿Se identificaron impactos o dependencias adicionales?  
- [ ] ¿Se requieren correcciones o pruebas adicionales?

---

## 📊 Conclusión
- **Resultado:**  
  - Replicación de falla: La falla fue replicada / No se logró replicar  
  - Validación de sugerencia: Sugerencia validada / Sugerencia no válida o duplicada  
- **Consistencia con la documentación:** Corresponde fielmente / Discrepancias encontradas  
- **Acciones acordadas:** listar acciones, responsables y plazos

---

## 📂 Registro de evidencias y seguimiento
- **Acta guardada en repositorio:** `.github/templates/acta-validacion-reunion.md` (copiar y pegar como comentario en el issue).  
- **Copia del acta en Documentos Generados > MR-[ID]:** `Acta validacion MR-[ID] – DDMMYYYY.md`.  
- **Issue en GitHub Projects:** mantener label **Pendiente-Validación** antes de la reunión; tras acta y correcciones marcar **Validado** o mantener **Pendiente-Validación** si hay observaciones.

---

## ✍️ Acuerdos y firmas
- **Validación aceptada:** ☐  
- **Correcciones solicitadas:** ☐  

- **Líder de Proyecto (LP):** __________________  
- **Mantenedor:** __________________  

> **Nota:** Las firmas pueden sustituirse por confirmación en Teams y por un comentario en este issue indicando: *"Acta registrada y aceptada por LP y Mantenedor"*.
