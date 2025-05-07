# .github/workflows/bitacora.yml
name: Actualizar Bitácora

on:
  push:
    branches:
      - main
  pull_request:
    types: [opened, closed]
  issues:
    types: [opened, closed]

jobs:
  update-log:
    runs-on: ubuntu-latest

    steps:
      - name: Clonar repositorio
        uses: actions/checkout@v4

      - name: Configurar Git
        run: |
          git config --global user.name "github-actions"
          git config --global user.email "actions@github.com"

      - name: Agregar entrada a la bitácora
        run: |
          echo "## $(date '+%Y-%m-%d %H:%M:%S')" >> BITACORA.md
          echo "- Evento: ${{ github.event_name }}" >> BITACORA.md
          echo "- Actor: ${{ github.actor }}" >> BITACORA.md
          echo "- Repositorio: ${{ github.repository }}" >> BITACORA.md
          echo "- Acción: ${{ github.event.action || 'push' }}" >> BITACORA.md
          echo "- Detalles: https://github.com/${{ github.repository }}/commit/${{ github.sha }}" >> BITACORA.md
          echo "" >> BITACORA.md

      - name: Commit y Push de la bitácora
        run: |
          git add BITACORA.md
          git commit -m "📘 Actualización automática de bitácora"
          git push
