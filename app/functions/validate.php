<?php

function validate(array $fields)
{
    $validatedData = [];
    $errors = [];
    $request = request();

    foreach ($fields as $field => $rules) {
        $rules = explode('|', $rules);
        $value = isset($request[$field]) ? $request[$field] : null;

        foreach ($rules as $rule) {
            if ($rule === 'required' && empty($value)) {
                $errors[$field][] = ucfirst($field) . ' is required.';
            } elseif ($rule === 'string' && !is_string($value)) {
                $errors[$field][] = ucfirst($field) . ' deve ser uma string.';
            } elseif ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field][] = 'Por favor, insira um ' . ucfirst($field) . ' válido.';
            }
        }

        if (!isset($errors[$field])) {
            $validatedData[$field] = htmlspecialchars($value);
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            flash('message', $error[0]);
        }

        return redirect("contact");
    }

    return (object) $validatedData;
}
