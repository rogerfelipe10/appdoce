describe('Testes de Pedidos', () => {

  it('Deve registrar pedido e reduzir o estoque', () => {

    cy.visit('http://127.0.0.1:8000/pedidos');

    cy.get('[data-cy="novo-pedido"]').click();

    cy.get('[data-cy="campo-cliente"]').select(1);

    cy.get('[data-cy="campo-produto"] option')
      .contains('Bolo de Chocolate')
      .then(($option) => {

        const texto = $option.text();
        const estoqueInicial = Number(
          texto.match(/estoque (\d+)/)[1]
        );

        expect(estoqueInicial).to.be.at.least(1);

        cy.get('[data-cy="campo-produto"]')
          .select($option.val());

        cy.get('[data-cy="campo-quantidade"]')
          .clear().type('1');

        cy.get('[data-cy="salvar-pedido"]').click();

        cy.get('[data-cy="mensagem-sucesso"]')
          .should('contain', 'Pedido registrado com sucesso!');

        cy.get('[data-cy="linha-pedido"]').first()
          .should('contain', 'Bolo de Chocolate')
          .and('contain', 'Confirmado');

        cy.get('[data-cy="novo-pedido"]').click();

        cy.get('[data-cy="campo-produto"] option')
          .contains('Bolo de Chocolate')
          .should('contain', `estoque ${estoqueInicial - 1})`);

      });

  });

});