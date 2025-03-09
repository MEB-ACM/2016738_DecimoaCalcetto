# Usa un'immagine base di Python
FROM python:3.11

# Imposta la directory di lavoro
WORKDIR /app

# Copia i file di dipendenze e installa le librerie
COPY requirements.txt .

RUN pip install --no-cache-dir -r requirements.txt

# Copia tutto il codice dentro il container
COPY . .

# Espone la porta 8000
EXPOSE 8000

# Comando per avviare FastAPI
CMD ["uvicorn", "app.main:app", "--host", "0.0.0.0", "--port", "8000", "--reload"]
