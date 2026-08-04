<?php

namespace App\Filament\Resources\Stats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->columns([

                TextColumn::make('value')
                    ->label('Value')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('label')
                    ->searchable(),

                IconColumn::make('accent')
                    ->label('Highlight')
                    ->boolean(),

                TextColumn::make('order')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->date('M d, Y')
                    ->sortable(),

            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No statistics yet')
            ->emptyStateDescription('Create your first portfolio statistic.');
    }
}