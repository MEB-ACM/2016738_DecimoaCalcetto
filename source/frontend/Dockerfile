# Usa un'immagine base di Node.js
FROM node:20

# Imposta la directory di lavoro
WORKDIR /app

# Copia package.json e installa dipendenze
COPY package.json ./

RUN npm install

# Copia il resto dei file
COPY . .

# Espone la porta 3000
EXPOSE 3000

# Comando per avviare l'app React
CMD ["npm", "start"]
