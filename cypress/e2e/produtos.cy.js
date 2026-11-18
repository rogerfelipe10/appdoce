describe('Testes de Produtos', () => {

  it('Deve acessar a página de produtos', () => {
    cy.visit('http://127.0.0.1:8000');

    cy.get('[data-cy="menu-produtos"]').click();

    cy.url().should('include', '/produtos');

    cy.get('[data-cy="tabela-produtos"]')
      .should('be.visible');
  });

  it('Deve impedir cadastro com nome vazio', () => {
    cy.visit('http://127.0.0.1:8000/produtos');

    cy.get('[data-cy="novo-produto"]').click();

    cy.get('[data-cy="salvar-produto"]').click();

    cy.get('[data-cy="erro-nome"]')
      .should('be.visible');
  });
   it('Deve cadastrar um produto com sucesso', () => {

    cy.visit('http://127.0.0.1:8000/produtos');

    cy.get('[data-cy="novo-produto"]').click();

    cy.get('[data-cy="campo-nome"]').type('Bolo Teste Cypress');

    cy.get('[data-cy="campo-categoria"]').select('Bolos');

    cy.get('[data-cy="campo-preco"]').type('45');

    cy.get('[data-cy="campo-estoque"]').type('15');

    cy.get('[data-cy="campo-estoque-minimo"]').type('5');

    cy.get('[data-cy="salvar-produto"]').click();

    cy.get('[data-cy="mensagem-sucesso"]')
      .should('contain', 'Produto cadastrado com sucesso!');

  });
});