<?php

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')

            ->columns([

                ImageColumn::make('photo')
                    ->label('Photo')
                    ->circular(),

                TextColumn::make('reviewer_name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company'),

                TextColumn::make('occupation'),

                TextColumn::make('location'),

                TextColumn::make('rating')
                    ->suffix(' ★'),

                ToggleColumn::make('active'),

            ])

            ->filters([])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}