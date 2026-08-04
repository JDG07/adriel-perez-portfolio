<?php

namespace App\Filament\Resources\Tools\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ToolsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->columns([

                ImageColumn::make('icon')
                    ->label('Logo')
                    ->square(),

                TextColumn::make('name')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('label')
                    ->label('Description')
                    ->limit(40),

                TextColumn::make('order')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->date('M d, Y')
                    ->sortable(),

            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No tools added')
            ->emptyStateDescription('Add the technologies used throughout your portfolio.');
    }
}