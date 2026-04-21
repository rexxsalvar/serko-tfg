<?php

it('switches the public interface language through the session', function (): void {
    $this->from('/')->get('/locale/es')->assertRedirect('/');

    $this->get('/')
        ->assertOk()
        ->assertSee('Entradas de futbol')
        ->assertSee('lang="es"', false);

    $this->from('/')->get('/locale/en')->assertRedirect('/');

    $this->get('/')
        ->assertOk()
        ->assertSee('Football tickets')
        ->assertSee('lang="en"', false);
});
