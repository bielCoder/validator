#
# 📌 Validador - Sistema de Validação de Textos
**Versão do Projeto:** `1.0.0`
Sistema desenvolvido para validação estrutural de textos, garantindo que estejam corretamente formatados de acordo com regras específicas.

---

## 📖 Sobre o Sistema

O **Validador** é uma aplicação responsável por analisar textos e validar sua estrutura.

### 🔎 O que o sistema valida:

- ✔️ Se o texto está corretamente envolto por **parênteses**
- ✔️ Se há **fechamento correto de caracteres especiais**
- ✔️ Validação estrutural de:
  - `{ }`
  - `[ ]`
  - `( )`
- ✔️ Verificação de balanceamento e integridade dos caracteres

O objetivo principal é garantir que entradas textuais estejam estruturalmente corretas antes de serem processadas por outras camadas do sistema.

---

# ⚙️ Formas de Instalação

O projeto pode ser executado de duas formas:

- ✅ Instalação manual (PHP + Composer)
- ✅ Utilizando Docker (recomendado)

---

# 🚀 Instalação Manual

## 📋 Requisitos

- PHP >= 8.0
- Composer
- Docker (Obrigatório)
- Git
---

## 1️⃣ Clonar o repositório

bash

git clone https://github.com/seu-usuario/validador.git

cd validador

docker compose up --build -d 

by: Gabriel Henrique 