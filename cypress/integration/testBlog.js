describe('Home', () => {
    it('Index', () => {
        cy.visit('/')
    })

    it('Menu', () => {
        cy.visit('/')
        cy.get('.b-nav-cname').each((element, index) => (
            cy.get('.b-nav-cname').eq(index).click()
        ))
    })

    it('Tag', () => {
        cy.visit('/')
        cy.get('.b-all-tname .b-tname').each(($el) => (
            cy.wrap($el).click()
        ))
    })

    it('Link', () => {
        cy.visit('/')
        cy.get('.b-link .b-link-a:last').click()
    })

    it('Search', () => {
        cy.visit('/')
        cy.get('.b-search-text').type('Welcome to')
        cy.get('.b-search-submit').click()
    })

    it('Article', () => {
        cy.visit('/')
        cy.get('.b-oa-title').first().click()
    })
})
