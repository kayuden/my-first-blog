<?php

namespace Src\Validation;

class Validator
{
    private $data;
    private $errors;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                            break;
                        case 'confirmation':
                            $this->confirmation($name, $this->data[$name], $this->data[str_replace("-conf", "", $name)]);
                            break;
                    }
                }
            }
        }

        return $this->getErrors();
    }

    private function required(string $name, string $value): void
    {
        $value = trim($value);

        if (empty($value)) {
            switch ($name) {
                case 'username':
                    $this->errors[$name][] = "Le nom d'utilisateur est requis.";
                    break;
                case 'email':
                    $this->errors[$name][] = "L'e-mail est requis.";
                    break;
                case 'password':
                    $this->errors[$name][] = "Le mot de passe est requis.";
                    break;
            }
        }
    }

    private function min(string $name, string $value, string $rule): void
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) {
            switch ($name) {
                case 'username':
                    $this->errors[$name][] = "Le nom d'utilisateur doit comprendre un minimum de {$limit} caractères.";
                    break;
                case 'email':
                    $this->errors[$name][] = "L'e-mail doit comprendre un minimum de {$limit} caractères.";
                    break;
                case 'password':
                    $this->errors[$name][] = "Le mot de passe doit comprendre un minimum de {$limit} caractères.";
                    break;
            }
        }
    }

    private function confirmation(string $name, string $value1, string $value2): void
    {
        if ($value1 !== $value2) {
            switch ($name) {
                case 'email-conf':
                    $this->errors[$name][] = "Les e-mails ne correspondent pas.";
                    break;
                case 'password-conf':
                    $this->errors[$name][] = "Les mots de passe ne correspondent pas.";
                    break;
            }
        }
    }

    private function getErrors(): ?array
    {
        return $this->errors;
    }
}
