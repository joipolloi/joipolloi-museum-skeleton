export const animateInView = (element) => {
  element.classList.add('animate');
  let handleIntersection = function (entries) {
    for (let entry of entries) {
      if (entry.isIntersecting) {
        element.classList.add('animate--start');
      }
    }
  };

  const observer = new IntersectionObserver(handleIntersection);
  observer.observe(element);
};
