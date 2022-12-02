# BR24_ABC_MEDSEG

Scripts de consulta ao SOC, pegando os funcionarios das empresas e consultado se há, para cada um deles, exames vencidos ou à vencer e EPIS para troca.

## Instalação do projeto
``` bash
    composer install
```

### Consultas e inserçoes no Bitrix

#### Consulta a uma lista especifica

```
    GET /lists.element.get
```
| Parâmetro   | Tipo    | Valor       | Descrição                           |
| :---------- |:------- |:----------- |:------------------------------------|
| `IBLOCK_TYPE_ID` | `string` | `listas` | **Obrigatório**. A palavra lists é obrigatória  
| `IBLOCK_ID` | `number` | `88` | **Obrigatório**. ID da lista a ser buscada no Bitrix


#### Inserção de Deals em um quadro
```
    POST /crm.deal.add
```
| Parâmetro   | Tipo    |Descrição                           |
| :---------- |:------- |:------------------------------------|
| `TITLE` | `string` | **Obrigatório**. Titulo da Deal
| `CATEGORY_ID` | `number` | **Obrigatório**. ID da lista a ser buscada no Bitrix
| `COMPANY_ID` | `number` | Código da empresa cadastrada no Bitrix
| `COMMENTS` | `text/html` | Texto com ou sem formato HTML de comentário da deal criada.
| `UF_CRM_1647281732101` | `array` | Código do serviço (Exame ou EPI)
| `UF_CRM_1587588560` | `string` | E-mail do funcionário
| `UF_CRM_1592364425346` | `string` | CPF do funcionário
| `UF_CRM_1592364565375` | `string` | Telefone de contato (celular/residencial)