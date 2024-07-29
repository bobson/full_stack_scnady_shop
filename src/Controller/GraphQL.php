<?php

namespace App\Controller;

use App\GraphQL\Types\MutationType;
use App\GraphQL\Types\ProductType;
use GraphQL\GraphQL as GraphQLBase;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\Type\SchemaConfig;
use App\GraphQL\Types\QueryType;
use RuntimeException;
use Throwable;

class GraphQL
{
    static public function handle()
    {
        try {
            $queryType = new QueryType();


            $mutationType = new MutationType();

            // See docs on schema options:
            // https://webonyx.github.io/graphql-php/schema-definition/#configuration-options
            $schema = new Schema(
                (new SchemaConfig())
                    ->setQuery($queryType)
                // ->setMutation($mutationType)
            );
            // dd($schema);

            $rawInput = file_get_contents('php://input');
            if ($rawInput === false) {
                throw new RuntimeException('Failed to get php://input');
            }
            // dd($rawInput);

            $input = json_decode($rawInput, true);
            if ($input === null) {
                throw new RuntimeException('Invalid JSON in request payload');
            }

            $query = $input['query'];
            if ($query === null) {
                throw new RuntimeException('No query provided in request payload');
            }

            $variableValues = $input['variables'] ?? null;

            $rootValue = ['prefix' => 'You said: '];
            $result = GraphQLBase::executeQuery($schema, $query, $rootValue, null, $variableValues);
            $output = $result->toArray();
            // dd($output);
        } catch (Throwable $e) {
            $output = [
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ];
        }

        header('Content-Type: application/json; charset=UTF-8');
        return json_encode($output);
    }
}
