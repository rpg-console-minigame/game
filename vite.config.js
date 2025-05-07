import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  base: '/', // Asegúrate de que la base esté configurada para el servidor de producción
  plugins: [
    react(),
  ],
  build: {
    outDir: 'public/build', // Esto asegurará que los archivos se generen en public/build
  },
});
