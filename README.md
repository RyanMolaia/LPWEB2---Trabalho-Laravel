# LPWEB2---Trabalho-Laravel

# 🚗 Projeto Laravel – Sistema de Venda de Carros

Este projeto é um sistema completo desenvolvido em **Laravel**, com foco em gestão e venda de veículos.  
Aqui você encontrará o passo a passo necessário para instalar, configurar e executar o sistema corretamente no ambiente local.

---

## 🛠️ Instalação do Projeto

### 🔹 1. Baixar os arquivos

  Acesse a guia "main" do repositorio e faça o download do repositorio.
  
  <img width="1348" height="499" alt="git" src="https://github.com/user-attachments/assets/1f08af85-1bf3-4560-b460-8faad5053d46" />
  
  Após fazer o download, extraia a pasta e abra no  VSCode.

### 🔹 2. Criar o banco do projeto

  No phpmyadmin, crie o banco com o nome "venda_carro".

### 🔹 3. Comando no VSCode

  Caso não tenho o composer instalado acesso o link: https://getcomposer.org/Composer-Setup.exe

  No VSCode execute os seguintes comandos:

    - composer install

    - php artisan migrate --seed

### 🔹 4. Executar o projeto

  No VSCode rode:

    - php artisan serve

  Assim é só acessar o site e utilizá-lo

### 🔹 5. Acesso admin

  Para acessar a area de administração, utilize o acesso abaixo:

  Usuário: admin@admin.com
  Senha: admin1234

### 🔹 OBSERVAÇÂO

  Para incluir as fotos do veiculos siga os exemplos abaixo:

  Campo "Link Imagem Priniciapl": "https://blog.autocompara.com.br/wp-content/uploads/2024/06/carros-esportivos-1024x683.jpeg.webp"
  Campo "Outras Imagens" links separados por virgulas: "https://blog.autocompara.com.br/wp-content/uploads/2024/06/carros-esportivos-1024x683.jpeg.webp,         https://blog.autocompara.com.br/wp-content/uploads/2024/06/carros-esportivos-1024x683.jpeg.webp" 

Exemplo de insert direto no phpmyadmin:

INSERT INTO carros 
(marca_id, modelo_id, cor_id, ano, status, placa, quilometragem, valor, descricao, imagem_principal, outras_imagens)
VALUES
(
  1, 
  1, 
  1,
  2022,
  'Disponível',
  'ABC1A23',
  12000,
  6500000.00,
  'Lamborghini Aventador SVJ em perfeito estado, modelo raro e de alta performance.',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202504/20250424/lamborghini-aventador-6-5-v12-gasolina-lp-7704-svj-isr-wmimagem18500562532.webp?s=fill&w=552&h=414&q=60',
  'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202504/20250424/lamborghini-aventador-6-5-v12-gasolina-lp-7704-svj-isr-wmimagem18500572434.webp?s=fill&w=552&h=414&q=60, https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202504/20250424/lamborghini-aventador-6-5-v12-gasolina-lp-7704-svj-isr-wmimagem18500572434.webp?s=fill&w=552&h=414&q=60'
);


### 🔹 Fotos das telas do projeto:

### 🔹 Index do site

<img width="1918" height="920" alt="indes_site" src="https://github.com/user-attachments/assets/439819fd-fe4f-4b47-955e-b3fb61306dc1" />

### 🔹 Guia Carros Novos

<img width="1919" height="919" alt="novos_carros" src="https://github.com/user-attachments/assets/74c3eb15-594c-4c2a-8ceb-e9ff7c92b48a" />

### 🔹 Guia Carros Seminovos

<img width="1919" height="925" alt="seminovos_carros" src="https://github.com/user-attachments/assets/cf5d8eef-44d2-45cd-a6ec-0f218cb7f93d" />

### 🔹 Carros Detalhes

<img width="1919" height="920" alt="detalhes_carro" src="https://github.com/user-attachments/assets/e940ae5c-db83-4bb5-9a3b-885f14f62c0d" />

### 🔹 Guia Contato

<img width="1919" height="922" alt="contato" src="https://github.com/user-attachments/assets/36048988-6fef-4974-9c9f-e643de919e68" />

### 🔹 Guia Sobre

<img width="1919" height="917" alt="sobre" src="https://github.com/user-attachments/assets/079894ba-bff7-4fcc-8085-a923e7dcda5a" />

### 🔹 Site Logado Como Admin

<img width="1919" height="917" alt="site_logado_admin" src="https://github.com/user-attachments/assets/daaaa847-9d79-4ccf-a864-ce56fcc208a6" />

### 🔹 Site Logado Como Cliente

<img width="1919" height="922" alt="site_logado_cliente" src="https://github.com/user-attachments/assets/d3c88e32-811a-47b6-8447-ff0174a65052" />

### 🔹 Tela de Login

<img width="1919" height="919" alt="login" src="https://github.com/user-attachments/assets/37a1a722-0264-4609-af82-6c68e1bd436c" />

### 🔹 Registro de Usuário

<img width="1919" height="919" alt="registrar_usuario" src="https://github.com/user-attachments/assets/bb9be90a-6976-489f-8ca9-d7cd35deede7" />


### 🔹 Reset de Senha Via Tela de Login

<img width="1919" height="922" alt="esqueceu_senha" src="https://github.com/user-attachments/assets/9e67a239-98e2-4d31-8bba-6f18efcb80e0" />

  Ao inserir o e-mail, receberá um link no e-mail informado e esse link redireciona para a página abaixo:

<img width="1919" height="919" alt="nova_senha" src="https://github.com/user-attachments/assets/c51d318f-9ce9-488e-9b5e-14ba75207ccb" />

### 🔹 Menu Admin (index)

<img width="1919" height="918" alt="index_menu_administrativo" src="https://github.com/user-attachments/assets/869180b1-913e-49ab-9084-d7767d4fbcc9" />

### 🔹 Menu Admin (Carros)

<img width="1919" height="923" alt="veiculos_index" src="https://github.com/user-attachments/assets/284e68f0-18eb-4d33-b40c-8515e813a315" />

### 🔹 Menu Admin (Carros - Cadastrar)

<img width="1919" height="920" alt="cadastro_veiculos" src="https://github.com/user-attachments/assets/69a5c48e-890e-45bb-8e61-59cfefbe2a6b" />

### 🔹 Menu Admin (Carros - Alterar)

<img width="1919" height="920" alt="alterar_veiculos" src="https://github.com/user-attachments/assets/89e78527-a43c-4c38-9403-4c6905fc922a" />

### 🔹 Menu Admin (Marcas)

<img width="1919" height="923" alt="marcas_index" src="https://github.com/user-attachments/assets/0cc22d9a-2e0c-4b8e-be2e-0cf702ff570e" />

### 🔹 Menu Admin (Marcas - Cadastrar)

<img width="1919" height="922" alt="cadastrar_marcas" src="https://github.com/user-attachments/assets/f4a2d4ea-444d-4388-86cd-41760cd6e3c2" />

### 🔹 Menu Admin (Marcas - Alterar)

<img width="1919" height="923" alt="alterar_marcas" src="https://github.com/user-attachments/assets/3060f191-0c14-430f-8236-ad67130be463" />

### 🔹 Menu Admin (Modelos)

<img width="1919" height="921" alt="modelos_index" src="https://github.com/user-attachments/assets/ea7009ca-bdcd-4ab7-8236-d670dbf1cb3a" />

### 🔹 Menu Admin (Modelos - Cadastrar)

<img width="1919" height="923" alt="cadastar_modelo" src="https://github.com/user-attachments/assets/44428175-8501-4d00-85ef-c5a15b242e9a" />

### 🔹 Menu Admin (Modelos - Alterar)

<img width="1919" height="926" alt="alterar_modelos" src="https://github.com/user-attachments/assets/a263a520-23a8-452f-a22e-f4c74daefc11" />

### 🔹 Menu Admin (Cores)

<img width="1919" height="922" alt="cores_index" src="https://github.com/user-attachments/assets/a2d3db36-dbce-48b4-8687-844b5a647dad" />

### 🔹 Menu Admin (Cores - Cadastrar)

<img width="1919" height="924" alt="cadastrar_cor" src="https://github.com/user-attachments/assets/39e7567d-6c8a-41e5-83e8-72004cd85f7b" />

### 🔹 Menu Admin (Cores - Alterar)

<img width="1919" height="919" alt="alterar_Cor" src="https://github.com/user-attachments/assets/54d0e762-420b-4e1b-8451-8a504b053c35" />


### 🔹 Logout Menu Admin

<img width="1919" height="919" alt="logout_menuadmin" src="https://github.com/user-attachments/assets/e8ec87b6-1aee-4357-85fa-d30f9c7944b4" />



























    
