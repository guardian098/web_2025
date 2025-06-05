PROGRAM HelloName(INPUT, OUTPUT);
USES
  DOS;
VAR
  Ch: INTEGER;
BEGIN
  WRITELN;
  Ch := POS('name=', GETENV('QUERY_STRING'));
  IF Ch <> 0
  THEN
    WRITELN('Hello dear, ', COPY(GETENV('QUERY_STRING'), Ch + 5))
  ELSE
    WRITELN('Hello Anonymous!')
END.
