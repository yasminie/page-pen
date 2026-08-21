import Image from "next/image";
import Flashcard from "./components/flashcard";
import ClassicFooter from './components/footer';


export default function Home() {
  return (
    <div>
      <Flashcard/>
      <ClassicFooter />
    </div>
  );
}
